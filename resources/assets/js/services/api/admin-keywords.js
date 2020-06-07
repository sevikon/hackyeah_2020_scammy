import axios from 'axios'
import {sendDeleteRequest, sendGetRequest, sendPatchRequest, sendPostRequest} from "../../utils/Http";

export const getKeywordList = (data) => {
  return sendGetRequest('/api/admin/keywords', data);
}

export const createKeyword = (data) => {
  return sendPostRequest('/api/admin/keywords', data);
}

export const getKeywordById = (id, data = {}) => {
  return sendGetRequest(`/api/admin/keywords/${id}`, data);
}

export const updateKeyword = (id, data) => {
  return sendPatchRequest(`/api/admin/keywords/${id}`, data);
}

export const deleteKeyword = (id) => {
  return sendDeleteRequest(`/api/admin/keywords/${id}`);
}
