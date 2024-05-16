const request = axios.create({
    baseURL: import.meta.env.VITE_APP_HOST_URL,
    validateStatus: status => status
});

export default request;
