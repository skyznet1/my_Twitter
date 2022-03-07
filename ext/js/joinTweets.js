document.getElementById("postTweet").addEventListener("keyup", () => {
    if ($("#postTweet").val().length >= 1) {
        $("#postCom").disabled = false
        $('#postCom').prop('disabled', false);
        console.log(false)
    } else {
        $('#postCom').prop('disabled', true);
        console.log(true)

    }

})


document.getElementById("postCom").addEventListener("click", () => {

    let areaVal = document.getElementById("postTweet").value

    let re = /(?:^|\W)#(\w+)(?!\w)/g, match, matches = [];
    while (match = re.exec(areaVal)) {
        matches.push(match[1]);
    }

    let regx = /(?:^|\W)@(\w+)(?!\w)/g, matching, matchs = [];
    while (matching = regx.exec(areaVal)) {
        matchs.push(matching[1]);
    }

    let hashtag = matches
    let aro = matchs
    console.log(hashtag)
    console.log(aro)

})