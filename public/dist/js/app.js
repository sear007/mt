 window.k_number = function( num) {
    if( typeof num !== 'number' ) return null;

    var numInteger = parseInt( num );
    var numString = numInteger.toString();
    var khmerNumber = '';
    var numbersKhmer = ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'];
    for( var i=0; i < numString.length; i++ ) {
        khmerNumber += numbersKhmer[parseInt(numString[i])];
    }
    return khmerNumber;
};
$('[data-toggle="tooltip"]').tooltip(); 