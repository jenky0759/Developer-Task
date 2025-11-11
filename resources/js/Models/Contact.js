import BaseModel from "@/Models/BaseModel.js";

export default class Contact extends BaseModel {

    constructor(data = {}) {
        super(data)
        this.first_name = data.first_name;
        this.last_name = data.last_name;
    }
}
