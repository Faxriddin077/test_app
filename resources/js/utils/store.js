import {createStore} from "vuex";

import request from "./request";


export default createStore({
    state: {},
    getters: {},
    mutations: {},
    actions: {
        async get({dispatch, commit}, {url, params = {}}) {
            return await request.get(url);
        },
        async post({dispatch, commit}, {url, model}) {
            return  await request.post(url, model);
        }
    }
});
