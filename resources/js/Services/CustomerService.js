import BaseService from "@/Services/BaseService.js";

class CustomerService extends BaseService {

    constructor() {
        super({
            baseURL: import.meta.env.VITE_API_URL + "/customer/"
        });
    }

    async getById(id) {
        return this.get(id);
    }

    // Should really be a paged list
    async getList(){
        return this.get('/list');
    }

    async create(customer) {
        return this.post('', customer);
    }

    async update(customer){
        return this.put('', customer);
    }

    async delete(id) {
        return this.delete(id);
    }

}

export default new CustomerService();
