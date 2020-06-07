import axios from 'axios'
import {sendDeleteRequest, sendGetRequest, sendPatchRequest, sendPostRequest} from "../../utils/Http";

export const getWebsiteList = (data) => {
  return sendGetRequest('/api/admin/websites', data);
}

export const createWebsite = (data) => {
  return sendPostRequest('/api/admin/websites', data);
}

export const getWebsiteById = (id, data = {}) => {
  return sendGetRequest(`/api/admin/websites/${id}`, data);
}

export const updateWebsite = (id, data) => {
  return sendPatchRequest(`/api/admin/websites/${id}`, data);
}

export const deleteWebsite = (id) => {
  return sendDeleteRequest(`/api/admin/websites/${id}`);
}
