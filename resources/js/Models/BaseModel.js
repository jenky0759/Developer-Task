
export default class BaseModel {
    constructor({
        id = null,
        createdAt = null,
        updatedAt = null
                }) {
        this.id = id;
        this.createdAt = createdAt;
        this.updatedAt = updatedAt;
    }
}
