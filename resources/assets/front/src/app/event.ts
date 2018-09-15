export class Event {
    constructor (
        public name:string,
        public description:string,
        public beginning_date:string,
        public end_date?:string,
        public photo?:string
        //public id?: number,
        //public likes?: number
    ) {}
}