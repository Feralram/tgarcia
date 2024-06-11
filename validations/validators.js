function isAlpha(string) {
    const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/i;

    return regex.test(string);
}

function isAlphaNumeric(string) {
    const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]+$/i;

    return regex.test(string);
}

function isDate(string){
    const regex = /^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/;

    return regex.test(string);
}

function isNumeric(string){
    const regex = /^[0-9]+$/

    return regex.test(string);
}

function isDecimal(string) {
    const regex = /^[0-9]+([.][0-9]+)?$/

    return regex.test(string)
}

function isBool(string) {
    const regex = /^[Sí|No]+$/;

    return regex.test(string);
}

function isGrade(string) {
    const regex = /^[Primero|Segundo|Tercero]+$/;

    return regex.test(string);
}

function isGenre(string) {
    const regex = /^[Hombre|Mujer|Otro]+$/;

    return regex.test(string);
}

function isZipCode(string) {
    const regex = /^[0-9]{5}$/

    return regex.test(string);
}

function isPhone(string) {
    const regex = /^[0-9]{10}$/

    return regex.test(string);
}

function isCivilStatus(string) {
    const regex = /^[Soltero(a)|Casado(a)|Unión Libre|Separado(a)|Divorciado(a)|Viudo(a)]+$/;

    return regex.test(string);
}

function isStudyGrade(string) {
    const regex = /^[Primaria|Secundaria|Media-superior|Superior|Ninguno]+$/;

    return regex.test(string);
}

function isOfficialDocument(string) {
    const regex = /^[INE|Cartilla|Pasaporte]+$/;

    return regex.test(string);
}

/*
    Valida:
    - Los primeros 3 (persona moral) o 4 (persona física) caracteres en mayúsculas.
    - Fecha válida (aunque para simplificarlo, no se están validando meses con menos de 31 días).
    - El dígito verificador sea un dígito o una letra A.
    - Permitiendo que haya guiones y/o espacios entre las partes.
    - Capturando cada parte en un grupo.
*/
function isRFC(rfc){
    const regex = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;

    return regex.test(rfc);
}

/*
    Valida:
    - 2 letras mayúsculas
    - 10 dígitos
*/
function isFolio(folio){
    const regex = /^[A-Z]{2}[0-9]{10}$/

    return regex.test(folio);
}

function isCURP(curp){
    const regex = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/
    validation = curp.match(regex)

    if (!validation) {
        return false
    }

    //Valida el dígito verificador
    function verifierDigit(validatedCurp) {
        let dict     = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma  = 0.0,
            lngDigit = 0.0;
        for(let i=0; i<17; i++)
            lngSuma = lngSuma + dict.indexOf(validatedCurp.charAt(i)) * (18 - i);
        lngDigit = 10 - lngSuma % 10;
        if (lngDigit == 10) return 0;
        return lngDigit;
    }
    if (validation[2] != verifierDigit(validation[1])){
    	return false;
    }
    return true; //Validado
    // return regex.test(string);
}

function isEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/

    return regex.test(email);
}

function passwordSecure(password){
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&+*-=])[a-zA-Z0-9@#$%^&+=]{8,}$/
    // Sin caracteres especiales
    const regexDos = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9@#$%^&+=]{8,}$/
    return regexDos.test(password)
}

function passwordConfirm(password, repeat){
    console.log(password, repeat)
    return password === repeat
}