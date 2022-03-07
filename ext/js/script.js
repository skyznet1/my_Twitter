window.onload = () => {


    let theme = sessionStorage.getItem("theme")
    if (theme !== null) {
        document.body.classList.toggle(theme)
    } else {
        document.body.classList.toggle("lightmode")
    }


    /*
        let tweet = document.querySelectorAll(".cardTweet")

        tweet.forEach(btn => {

            btn.addEventListener('click', event => {
                location.href = "../html/commentaires.html";
            })
        });
    */

    /*réponse tweet*/
    /*$('.com-response-at').hide()
    $('.textAreaSubBTN').hide()
    $('#postTweet').on("click", function () {
        $('.textAreaSubBTN').show()
        $('.com-response-at').show()
    })*/


    let dropDown = document.querySelector("#dropup");
    let dropDownDiv = document.querySelector(".dropdown");
    dropDown.addEventListener("click", function () {
        dropDownDiv.classList.toggle('show-menu');
    });

    let T1 = ["#JhonnyHallyday", "#Siphano", "#Ginger", "#France", "#Etchebest", "#ETH", "#Pain-Chocolat"]
    let TOP1 = ["678K tweets", "324K tweets", "287K tweets", "670K tweets", "468K tweets", "789K tweets", "985K tweets", "1.2M tweets"]
    let TOP2 = ["56K tweets", "234K tweets", "121K tweets", "77K tweets", "96K tweets"]
    let TOP3 = ["14,7K tweets", "22,8K tweets", "1,2K tweets", "8,7K tweets", "32K tweets", "41K tweets", "46K tweets", "16K tweets"]
    let T1_2 = ["Apnée · Tendances", "Secourisme · Tendances", "Politique · Tendances", "Litérature · Tendances", "Prolo · Tendances"]

    let selectRndInT1 = T1_2[Math.floor(Math.random() * T1_2.length)]
    let selectRndInT2 = T1[Math.floor(Math.random() * T1.length)]
    let selectRndInT3 = TOP1[Math.floor(Math.random() * TOP1.length)]

    let selectRndInT2_0 = T1_2[Math.floor(Math.random() * T1_2.length)]
    let selectRndInT2_1 = T1[Math.floor(Math.random() * T1.length)]
    let selectRndInT2_2 = TOP2[Math.floor(Math.random() * TOP2.length)]

    let selectRndInT3_0 = T1_2[Math.floor(Math.random() * T1_2.length)]
    let selectRndInT3_1 = T1[Math.floor(Math.random() * T1.length)]
    let selectRndInT3_2 = TOP3[Math.floor(Math.random() * TOP3.length)]

    $("#t1").html(selectRndInT1)
    $("#T1-1").html(selectRndInT2)
    $("#T1-2").html(selectRndInT3)


    $("#T2").html(selectRndInT2_0)
    $("#T2_1").html(selectRndInT2_1)
    $("#T2_2").html(selectRndInT2_2)

    $("#T3").html(selectRndInT3_0)
    $("#T3_1").html(selectRndInT3_1)
    $("#T3_2").html(selectRndInT3_2)

    counter = 0
    keyCount = 0
    document.getElementById("postTweet").addEventListener("keyup", (e) => {

        let circle = document.getElementById("teste")


        if (e.code == "Backspace") {

            if (keyCount <= 0) {
                keyCount = 0
                return;
            }

            counter = counter - 0.7142
            circle.setProgress(counter)
            keyCount = keyCount - 1

            console.log($('#postTweet').val())

            if ($('#postTweet').val().length === 0) {
                circle.setProgress(0)
                counter = 0
                keyCount = 0
            }

        } else {


            if (keyCount >= 140) {
                keyCount = 140
                return;
            }

            counter = counter + 0.7142
            circle.setProgress(counter)
            keyCount = keyCount + 1

            if ($('#postTweet').val().length === 0) {
                circle.setProgress(0)
                counter = 0
                keyCount = 0
            }

        }
    })


    class ProgressRing extends HTMLElement {
        constructor() {
            super();
            const stroke = this.getAttribute('stroke');
            const radius = this.getAttribute('radius');
            const normalizedRadius = radius - stroke * 2;
            this._circumference = normalizedRadius * 2 * Math.PI;

            this._root = this.attachShadow({mode: 'open'});
            this._root.innerHTML = `
      <svg
        height="${radius * 2}"
        width="${radius * 2}"
       >
         <circle
           stroke="rgb(29, 155, 240)"
           stroke-dasharray="${this._circumference} ${this._circumference}"
           style="stroke-dashoffset:${this._circumference}"
           stroke-width="${stroke}"
           fill="transparent"
           r="${normalizedRadius}"
           cx="${radius}"
           cy="${radius}"
        />
      </svg>
      <style>
        circle {
          transition: stroke-dashoffset 0.35s;
          transform: rotate(-90deg);
          transform-origin: 50% 50%;
        }
      </style>
    `;
        }

        static get observedAttributes() {
            return ['progress'];
        }

        setProgress(percent) {
            const offset = this._circumference - (percent / 100 * this._circumference);
            const circle = this._root.querySelector('circle');
            circle.style.strokeDashoffset = offset;
        }

        attributeChangedCallback(name, oldValue, newValue) {
            if (name === 'progress') {
                this.setProgress(newValue);
            }
        }
    }

    window.customElements.define('progress-ring', ProgressRing);

    $('#openPhotoTweet').click(function () {
        $('#PhotoTweet').trigger('click');
    });
}