import BaseModel from "@/Models/BaseModel.js";

export default class Customer extends BaseModel {

    constructor(data = {}) {
        super(data)
        this.name = data.name;
        this.reference = data.reference;
        this.category_id = data.category_id;
        this.start_date = data.start_date;
        this.description = data.description;
        this.contacts = data.contacts;
    }
}
