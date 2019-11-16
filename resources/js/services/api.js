import axios from "axios";

const requestHelper = axios.create({
    baseURL: 'http://localhost:8000/api/'
});

const routes = {
    roles: {
        get: () => requestHelper({
            url: 'roles',
            method: 'get'
        })
    }
}

export default routes;