function IsLeapYear(year) {
    return year%400 == 0 || (year%4 == 0 && year%100 != 0);
}

function GetYearLength(year)  {
    if(IsLeapYear(year)) {
        return 366;
    } else {
        return 365;
    }
}

function GetMonthLength(month, year) {
    if(month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12) {
        return 31;
    }

    if (month == 2) {
        if(IsLeapYear(year)) {
            return 29;
        } else {
            return 28;
        }
    }

    return 30;
}

function getOffsetDate(date, offset) {
    let year = parseInt(date.substring(0, 4));
    let month = parseInt(date.substring(5, 7));
    let day = parseInt(date.substring(8, 10));

    let nbDay = day
    for(var i = 1; i < month; i++) {
        nbDay += GetMonthLength(i, year);
    }
    let newNbDay = nbDay + offset;


    let newYear = year;

    while(newNbDay <= 0) {
        newYear --;
        newNbDay += GetYearLength(newYear);
    }

    while(newNbDay > GetYearLength(newYear)) {
        newNbDay -= GetYearLength(newYear);
        newYear ++;
    }

    let newMonth = 1;
    while(newNbDay > GetMonthLength(newMonth, year)) {
        newNbDay -= GetMonthLength(newMonth, year);
        newMonth ++;
    }

    let newDay = newNbDay; 
    

    return StrDate(newDay, newMonth, newYear);
}


function StrDate(day, month, year) {
    strDay = day.toString();
    if(strDay.length == 1) {
        strDay = "0" + strDay;
    }

    strMonth = month.toString();
    if(strMonth.length == 1) {
        strMonth = "0" + strMonth;
    }


    strYear = year.toString();

    return strYear + "-" + strMonth + "-" + strDay;
}

function GetAllWeekDays(date) {
    dateObj = new Date(date);

    const numberdayweek = [6,0,1,2,3,4,5];
    weekDay = numberdayweek[dateObj.getDay()];

    let dates = [];

    for(var i = -weekDay; i < 7 - weekDay; i++) {


        dates.push(getOffsetDate(date , i));
    }

    return dates;
}

function getAllDaysOfCurrentWeek() {
    date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    return GetAllWeekDays(StrDate(day, month, year));
}

