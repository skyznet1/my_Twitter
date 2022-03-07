let i = 0

let tweet = document.querySelectorAll("#cardTweet")
tweet.forEach(btn => {

    let id = document.getElementById('id_tweet' + i).value

    btn.addEventListener('click', event => {
        location.href = "../html/commentaires.php?id=" + id;
    })
    i++
});