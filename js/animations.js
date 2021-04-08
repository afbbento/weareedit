// USING SPLITTING.JS

/*
window.addEventListener("load", function () {
  let revealText = document.querySelectorAll(".reveal-text");
  let results = Splitting({ target: revealText, by: "lines" });

  results.forEach((splitResult) => {
    const wrappedLines = splitResult.lines
      .map(
        (wordsArr) => `
        <span class="line"><div class="words">
          ${wordsArr
            .map(
              (word) => `${word.outerHTML}<span class="whitespace"> 
         </span>`
            )
            .join("")}
        </div></span>`
      )
      .join("");
    splitResult.el.innerHTML = wrappedLines;
  });

  gsap.registerPlugin(ScrollTrigger);
  let revealLines = revealText.forEach((element) => {
    const lines = element.querySelectorAll(".line .words");

    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: element,
	      toggleActions:"restart none none reset",
      }
    });
    tl.set(revealText, { autoAlpha: 1 });
    tl.from(lines, 1, {
      yPercent: 100,
      ease: Power3.out,
      stagger: 0.25,
      delay: 0.2
    });
  });
});
*/

// WITHOUT SPLITTING.JS
(function($) {
window.addEventListener("load", function () {
  let splitWords = function (selector) {
    var elements = document.querySelectorAll(selector);

    elements.forEach(function (el) {
      el.dataset.splitText = el.textContent;
      el.innerHTML = el.textContent
        .split(/\s/)
        .map(function (word) {
          return word
            .split("-")
            .map(function (word) {
              return '<span class="word">' + word + "</span>";
            })
            .join('<span class="hyphen">-</span>');
        })
        .join('<span class="whitespace"> </span>');
    });
  };

  let splitLines = function (selector) {
    var elements = document.querySelectorAll(selector);

    splitWords(selector);

    elements.forEach(function (el) {
      var lines = getLines(el);

      var wrappedLines = "";
      lines.forEach(function (wordsArr) {
        wrappedLines += '<span class="line"><span class="words">';
        wordsArr.forEach(function (word) {
          wrappedLines += word.outerHTML;
        });
        wrappedLines += "</span></span>";
      });
      el.innerHTML = wrappedLines;
    });
  };

  let getLines = function (el) {
    var lines = [];
    var line;
    var words = el.querySelectorAll("span");
    var lastTop;
    for (var i = 0; i < words.length; i++) {
      var word = words[i];
      if (word.offsetTop != lastTop) {
        // Don't start with whitespace
        if (!word.classList.contains("whitespace")) {
          lastTop = word.offsetTop;

          line = [];
          lines.push(line);
        }
      }
      line.push(word);
    }
    return lines;
  };

  splitLines(".reveal-text");

  let revealText = document.querySelectorAll(".reveal-text");

  gsap.registerPlugin(ScrollTrigger);
  let revealLines = revealText.forEach((element) => {
    const lines = element.querySelectorAll(".words");

    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: element,
        toggleActions: "play none none none"
      }
    });
    tl.set(element, { autoAlpha: 1 });
    tl.from(lines, {
      yPercent: 100,
      duration: 0.55,
      ease: Power4.out,
      stagger: 0.25
    });
  });
  
    gsap.utils.toArray(".reveal-block").forEach(box => {
    var tl2 = gsap.timeline({
        scrollTrigger: {
        trigger: box,
        toggleActions: "play none none none",
        start: "top 95%"
        }
    });

        
        tl2.to(box, {
            duration: .4,
            yPercent: 20,
            opacity: 0,
            ease: Power4.easeOut

        });
        tl2.to(box, {
            duration: .4,
            yPercent: 0,
            opacity: 1
        });

    });

    
    var img_wipe = gsap.timeline({
        scrollTrigger: {
        trigger: ".img__transition__wipe",
        start: "top 90%",
        toggleClass: "active",
        toggleActions: "play none none none"
        }
    });
    img_wipe.to(".img__transition__wipe", {
            duration: 0.6,
            ease: Power4.out,
            xPercent: 100
        });


    var count_numbers = gsap.timeline({
        scrollTrigger: {
        trigger: "section.about",
        toggleActions: "play none none none",
        start: "top 100%",
        end: "bottom",
        onEnter: () => logRed("onEnter"),
        toggleClass: "active",
        once: true
        }
    });

    function logRed(text) {
        
         $('.Count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });    
    }

   
    /**SWIPER BOXES*/
    let revealBoxes = document.querySelectorAll(".courses-container .swiper-wrapper");
    let reveal_boxes = revealBoxes.forEach((element_box) => {
        const boxes = element_box.querySelectorAll(".swiper-slide");
    
    var tl2 = gsap.timeline({
        scrollTrigger: {
        trigger: element_box,
        toggleActions: "play none none none",
        start: "top 90%",
        }
    });

        tl2.to(boxes, {
            duration: 0.4,
            ease: Power4.out,
            stagger: 0.10,
            opacity: 1
        });

    });

    /**SWIPER BOXES*/
    let revealSlider = document.querySelectorAll(".alumni-slider .swiper-wrapper");
    let reveal_slider = revealSlider.forEach((element_box) => {
        const boxes = element_box.querySelectorAll(".swiper-slide");
    
    var tl2 = gsap.timeline({
        scrollTrigger: {
        trigger: element_box,
        toggleActions: "play none none none",
        start: "top 90%",
        }
    });

        tl2.to(boxes, {
            duration: 0.4,
            ease: Power4.out,
            stagger: 0.10,
            opacity: 1
        });

    });
    
});
})( jQuery );