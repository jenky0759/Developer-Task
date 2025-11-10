
export default class BaseService {

    _instance = null;

    constructor(options) {
        this._instance = axios.create(options);
    }

    async _baseRequest(request, config){
        try {
            const response = await this._instance(request, config);

            return response.data;
        } catch (error) {
            console.error(`Error occurred for request ${request.url}`, error);
            if(error.response) {
                throw {
                    message: error.response.message,
                    status: error.response.status,
                    data: error.response.data
                };
            }

            throw {
                message: "An error occurred making the request"
            }
        }
    }

    async get(url, config) {
        return this._baseRequest({
            method: 'GET',
            url: url
        }, config);
    }

    async post(url, data, config) {

        return this._baseRequest({
            method: 'POST',
            url,
            data
        }, config);
    }

    async put(url, data, config) {

        return this._baseRequest({
            method: 'PUT',
            url,
            data
        }, config);
    }

    async delete(url, config) {

        return this._baseRequest({
            method: 'DELETE',
            url
        }, config);
    }
}
