function send (type) {
    console.log(type);
    let value = type == 1? ($("#lex_value")[0].value):($("#capicua_value")[0].value);
    console.log(value);
    let requestData = {
        type: type,
        value: value
    };
    $("#result").load('pages/result.php', requestData);

}
