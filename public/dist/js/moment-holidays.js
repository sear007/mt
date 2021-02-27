//## Moment.JS Holiday Plugin
//
//Usage:
//  Call .holiday() from any moment object. If date is a US Federal Holiday, name of the holiday will be returned.
//  Otherwise, return nothing.
//
//  Example:
//    `moment('12/25/2013').holiday()` will return "Christmas Day"
//
//Holidays:
//  You can configure holiday bellow. The 'M' stands for Month and represents fixed day holidays.
//  The 'W' stands for Week, and represents holidays with date based on week day rules.
//  Example: '10/2/1' Columbus Day (Second monday of october).
//
//License:
//  Copyright (c) 2013 [Jr. Hames](http://jrham.es) under [MIT License](http://opensource.org/licenses/MIT)
(function() {
    var moment;

    moment = typeof require !== "undefined" && require !== null ? require("moment") : this.moment;

    //Holiday definitions
    var _holidays = {
    'M': {//Month, Day
            '01/01': ["New Year's Day","ចូលឆ្នាំសកល"],
            '07/01': ["Victory over Genocide Day","ទិវា​ជ័យជម្នះ​លើ​របប​ប្រល័យ​ពូជ​សាសន៍"],
            '08/03': ["International Women's Day","ទិវា​នារី​អន្តរជាតិ"],
            '14/04': ["Khmer New Year Day","ពិធី​បុណ្យ​ចូល​ឆ្នាំ​ថ្មី ប្រពៃណី​ជាតិ"],
            '15/04': ["Khmer New Year Day","ពិធី​បុណ្យ​ចូល​ឆ្នាំ​ថ្មី ប្រពៃណី​ជាតិ"],
            '16/04': ["Khmer New Year Day","ពិធី​បុណ្យ​ចូល​ឆ្នាំ​ថ្មី ប្រពៃណី​ជាតិ"],
            '26/04': ["Visak Bochea Day","ពិធី​បុណ្យ​វិសាខ​បូជា"],
            '30/04': ["Royal Plowing Ceremony","ពិធី​បុណ្យ​វិសាខ​បូជា"],
            '01/05': ["International Labor Day","ទិវា​ពលកម្ម​អន្តរជាតិ"],
            '14/05': ["King's Birthday, Norodom Sihamoni","ព្រះ​រាជ​ពិធី​បុណ្យ​ចម្រើន​ព្រះ​ជន្ម ព្រះ​ករុណា​ព្រះ​បាទ​សម្តេច ព្រះ​បរម​នាថ នរោត្តម សីហមុនី ព្រះ​មហាក្សត្រ នៃ​ព្រះរាជាណាចក្រ​កម្ពុជា"],
            '08/06': ["King's Mother Birthday, Norodom Monineath Sihanouk","ព្រះ​រាជ​ពិធី​បុណ្យ​ចម្រើន​ព្រះ​ជន្ម សម្តេច​ព្រះ​មហាក្សត្រី នរោត្តម មុនិនាថ សីហនុ ព្រះ​វររាជ​មាតា​ជាតិ​ខ្មែរ"],
            '24/08': ["Constitutional Day","ទិវា​ប្រកាស​រដ្ឋ​ធម្មនុញ្ញ"],
            '05/10': ["Pchum Ben Day","ពិធី​បុណ្យ​ភ្ជុំ​បិណ្ឌ"],
            '06/10': ["Pchum Ben Day","ពិធី​បុណ្យ​ភ្ជុំ​បិណ្ឌ"],
            '07/10': ["Pchum Ben Day","ពិធី​បុណ្យ​ភ្ជុំ​បិណ្ឌ"],
            '15/10': ["Commemoration Day of King's Father, Norodom Sihanouk","ព្រះ​រាជ​ពិធី​គ្រង​ព្រះ​បរម​រាជ​សម្បត្តិ​របស់ ព្រះ​ករុណា ព្រះ​បាទ​សម្តេច​ព្រះ​បរមនាថ នរោត្តម សីហមុនី ព្រះ​មហាក្សត្រ នៃ​ព្រះរាជាណាចក្រ​កម្ពុជា"],
            '09/11': ["Independence Day","ពិធី​បុណ្យ​ឯករាជ្យ​ជាតិ"],
            '18/11': ["Water Festival Ceremony","ព្រះ​រាជ​ពិធី​បុណ្យ​អុំ​ទូក បណ្ដែត​ប្រទីប និង​សំពះ​ព្រះ​ខែ អកអំបុក"],
            '19/11': ["Water Festival Ceremony","ព្រះ​រាជ​ពិធី​បុណ្យ​អុំ​ទូក បណ្ដែត​ប្រទីប និង​សំពះ​ព្រះ​ខែ អកអំបុក"],
            '20/11': ["Water Festival Ceremony","ព្រះ​រាជ​ពិធី​បុណ្យ​អុំ​ទូក បណ្ដែត​ប្រទីប និង​សំពះ​ព្រះ​ខែ អកអំបុក"],
        },
    };
    moment.fn.holiday = function() {
        var diff = 1+ (0 | (this._d.getDate() - 1) / 7),
            memorial = (this._d.getDay() === 1 && (this._d.getDate() + 7) > 30) ? "5" : null;

        return (_holidays['M'][this.format('MM/DD')] || _holidays['W'][this.format('M/'+ (memorial || diff) +'/d')]);
    };

    if ((typeof module !== "undefined" && module !== null ? module.exports : void 0) != null) {
        module.exports = moment;
    }

}(this));