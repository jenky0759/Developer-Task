import BaseService from "@/Services/BaseService.js";

class ContactService extends BaseService {

    constructor() {
        super({
            baseURL: import.meta.env.VITE_API_URL + "/contact/"
        });
    }

    async getById(id) {
        return this.get(id);
    }

    // Should really be a paged list
    async getList(){
        return this.get('/list');
    }

    async create(contact) {
        return this.post('', contact);
    }

    async update(contact){
        return this.put(`${contact.id}`, contact);
    }

    async deleteById(id) {
        return this.delete(id);
    }
}

export default new ContactService();
