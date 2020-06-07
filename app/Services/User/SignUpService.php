<?php

namespace App\Services\User;

use App\Contracts\Repository\UserRepositoryContract as UserRepository;
use App\Models\User;
use App\Services\Common\StaticArray;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\ApiTokenCookieFactory;

class SignUpService
{
    private $validator;
    /**
     * @var \Response $response
     */
    private $response;
    private $cookie;
    private $user;

    public function __construct(
        Validator $validator,
        UserRepository $user,
        Response $response,
        ApiTokenCookieFactory $cookie
    )
    {
        $this->user = $user;
        $this->cookie = $cookie;
        $this->response = $response;
        $this->validator = $validator;
    }

    public function validateUserData($data)
    {
        return $this->validator->make($data, [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
    }

    public function signUpResponse($userInfo, $csrfToken)
    {
        try {
            $newUser = $this->signUp($userInfo);
            $newUser->save();

            $apiCookie = $this->cookie->make($newUser->id, $csrfToken);

            return $this->response->success(['message' => 'User successfully signed up'])->withCookie($apiCookie);
        } catch (ValidationException $e) {
            return $this->response->validateError($e->errors());
        }
    }

    /**
     * @param $userInfo
     * @return User
     * @throws ValidationException
     */
    public function signUp($userInfo)
    {
        $validator = $this->validateUserData($userInfo);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $this->user->create($userInfo);
    }
}
