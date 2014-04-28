$(function() {

    setInterval( function() {
        var seconds = new Date().getSeconds();
        var sdegree = seconds * 6;
        var srotate = "rotate(" + sdegree + "deg)";

        $("#sec").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});

    }, 1000 );


    setInterval( function() {
        var hours = new Date().getHours();
        var mins = new Date().getMinutes();
        var year = new Date().getFullYear();
        var day = new Date().getDay();
        var date = new Date().getDate();
        var weekday=new Array(7);
        weekday[0]="Sunday";
        weekday[1]="Monday";
        weekday[2]="Tuesday";
        weekday[3]="Wednesday";
        weekday[4]="Thursday";
        weekday[5]="Friday";
        weekday[6]="Saturday";

        var month=new Array();
        month[0]="January";
        month[1]="February";
        month[2]="March";
        month[3]="April";
        month[4]="May";
        month[5]="June";
        month[6]="July";
        month[7]="August";
        month[8]="September";
        month[9]="October";
        month[10]="November";
        month[11]="December";

        var hdegree = hours * 30 + (mins / 2);
        var hrotate = "rotate(" + hdegree + "deg)";
        $('#digital .hour').html(hours);
        $('#digital .mins').html(mins);
        $('#digital .day').html(weekday[day]);
        $('#digital .month').html(month[new Date().getMonth()]);
        $('#digital .year').html(year);
        $('#digital .date').html(date);
        $("#hour").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});

    }, 1000 );


    setInterval( function() {
        var mins = new Date().getMinutes();
        var mdegree = mins * 6;
        var mrotate = "rotate(" + mdegree + "deg)";
        $("#min").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
    }, 1000 );
});