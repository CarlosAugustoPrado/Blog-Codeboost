var slide_podcast = new Swiper(".slide-podcast", {
  slidesPerView: 4,
  spaceBetween: 32,
  pagination: {
    el: ".s-podcasts .top .swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".s-podcasts .top .controle .btn-next",
    prevEl: ".s-podcasts .top .controle .btn-prev",
  },
  speed: 600,
  breakpoints: {
    320: {
      slidesPerView: 1.1,
      spaceBetween: 20
    },
    500: {
      slidesPerView: 1.5,      
    },
    768: {
      slidesPerView: 2.1,
    },
    991: {
      slidesPerView: 2.5
    },
    1100: {
      slidesPerView: 3.5,
      spaceBetween: 32,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 32,
    }

    
  } 
});


/* SCRIPT DO BOTÃO DO FOOTER */
  const btnScrollTop = document.getElementById('js-btn-scroll-top');

  btnScrollTop.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    })
  })


/* SCRIPT MENU MOBILE */
  const btnMobile = document.getElementById('js-btn-mobile');

  btnMobile.addEventListener('click', () => {
    btnMobile.classList.toggle('is-active');
    document.documentElement.classList.toggle('menu-opened')
  })


/* SCRIPTS DA NAVEGAÇÃO POR TÓPICOS */

const listTopics = document.querySelector('.js-topics');
const topics = document.querySelectorAll('.s-detalhes-post .featured-info-post .info-post-geral .right-content .content-post h2');



if(listTopics) {
  // CRIAÇÃO DOS ELEMENTOS
  topics.forEach(topic => {
    let listElement = document.createElement('li');
    listTopics.appendChild(listElement);

    let ancorTopic = document.createElement('a');
    ancorTopic.setAttribute('href', '#');
    listElement.appendChild(ancorTopic);

    let textTopic = document.createElement('span');
    textTopic.textContent = topic.textContent;
    ancorTopic.appendChild(textTopic);
  })

  
  const allTopics = document.querySelectorAll('.js-topics li a');
  
  // ADICIONANDO A CLASSE ATIVA
  allTopics[0].classList.add('active');

  // RETORNAR POSIÇÃO DO ELEMENTO
  function offset(el) {
    if (document) {
      const rect = el.getBoundingClientRect()
      const scrollLeft =
        window.pageXOffset || document.documentElement.scrollLeft
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop
      return { top: rect.top + scrollTop, left: rect.left + scrollLeft }
    }
  }

  
  function handleScrollTop(position) {
    if(document) {
      const topics = document.querySelectorAll('.s-detalhes-post .featured-info-post .info-post-geral .right-content .content-post h2')[position];

      window.scroll({
        behavior: 'smooth',
        left: 0,
        top: offset(topics).top - 110
      })
    }
  }

  /* EVENTO DE CLIQUE */
  allTopics.forEach((item, index) => {
    item.addEventListener('click', (event) => {
      event.preventDefault();

      allTopics.forEach(all => {
        all.classList.remove('active');
      })

      item.classList.add('active');

      handleScrollTop(index);
    })
  })
}