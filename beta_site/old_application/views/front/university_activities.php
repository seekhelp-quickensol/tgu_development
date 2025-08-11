<?php include('header.php');?>
	<style>
		figure {
		  border: 1px #cccccc solid;
		  padding: 4px;
		  margin: auto;
		}

		figcaption {
		  background-color: black;
		  color: white;
		  font-style: italic;
		  padding: 2px;
		  text-align: center;
		}
        .asyncGallery__Next, .asyncGallery__Prev {
    position: absolute;
    top: 50%;
    width: 30px;
    height: 30px;
    z-index: 1000;
    transition: transform 200ms, opacity 200ms;
    transform: translateY(-50%);
}
.asyncGallery__Prev {
    left: 40px;
}
.asyncGallery__Next {
    right: 40px;
}
        .gallery{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .gallery div{
            max-width: 100%;
            margin: 0px;
            transition: opacity 200ms;
            cursor: pointer;
            margin-bottom: 15px;
        }
        .gallery div img{
            max-width: 100%;
            min-width: 100%;
            height: 211px;
            margin-bottom:15px;
        }
        .university_activities h5{
            background: #9a1e10;
            color: white;
            width: 100%;
            font-size: 16px;
            padding-top: 10px;
            padding-bottom: 10px;
            margin-top: 0px;
            padding-left: 10px;
            /* text-align: center; */
            font-weight: 500;
        }

        .asyncGallery {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            z-index: 1000;
            visibility: hidden;
            background-color: rgba(0, 0, 0, 0.95);
            transition: opacity 200ms, visibility 200ms;
        }
        .asyncGallery button {
            background-color: transparent;
            border: 0;
            outline: 0;
            padding: 0;
            font-size: 0;
            cursor: pointer;
        }
        .asyncGallery__Prev:before {
            transform: translate3d(-50%, -50%, 0) scale(-1);
            background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 129 129' xmlns:xlink='http://www.w3.org/1999/xlink' enable-background='new 0 0 129 129'%3E%3Cg%3E%3Cpath d='m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z' fill='%23fff'/%3E%3C/g%3E%3C/svg%3E%0A");
        }
        .asyncGallery__Next:before {
            transform: translate3d(-50%, -50%, 0);
            background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 129 129' xmlns:xlink='http://www.w3.org/1999/xlink' enable-background='new 0 0 129 129'%3E%3Cg%3E%3Cpath d='m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z' fill='%23fff'/%3E%3C/g%3E%3C/svg%3E%0A");
        }
        .asyncGallery__Next:before, .asyncGallery__Prev:before {
            position: absolute;
            content: "";
            top: 50%;
            left: 50%;
            /* background-image: url(data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 129 129' xmlns:xlink='http://www.w3.org/1999/xlink' enable-background='new 0 0 129 129'%3E%3Cg%3E%3Cpath d='m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z' fill='%23fff'/%3E%3C/g%3E%3C/svg%3E%0A); */
            width: 30px;
            height: 30px;
            background-repeat: no-repeat;
            background-size: 30px 30px;
        }
        .asyncGallery__Close {
            position: absolute;
            top: 40px;
            right: 40px;
            width: 30px;
            height: 30px;
            z-index: 1000;
            background-repeat: no-repeat;
            background-size: 30px 30px;
            background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iNTEycHgiIHZlcnNpb249IjEuMSIgaGVpZ2h0PSI1MTJweCIgdmlld0JveD0iMCAwIDY0IDY0IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2NCA2NCI+CiAgPGc+CiAgICA8cGF0aCBmaWxsPSIjRkZGRkZGIiBkPSJNMjguOTQxLDMxLjc4NkwwLjYxMyw2MC4xMTRjLTAuNzg3LDAuNzg3LTAuNzg3LDIuMDYyLDAsMi44NDljMC4zOTMsMC4zOTQsMC45MDksMC41OSwxLjQyNCwwLjU5ICAgYzAuNTE2LDAsMS4wMzEtMC4xOTYsMS40MjQtMC41OWwyOC41NDEtMjguNTQxbDI4LjU0MSwyOC41NDFjMC4zOTQsMC4zOTQsMC45MDksMC41OSwxLjQyNCwwLjU5YzAuNTE1LDAsMS4wMzEtMC4xOTYsMS40MjQtMC41OSAgIGMwLjc4Ny0wLjc4NywwLjc4Ny0yLjA2MiwwLTIuODQ5TDM1LjA2NCwzMS43ODZMNjMuNDEsMy40MzhjMC43ODctMC43ODcsMC43ODctMi4wNjIsMC0yLjg0OWMtMC43ODctMC43ODYtMi4wNjItMC43ODYtMi44NDgsMCAgIEwzMi4wMDMsMjkuMTVMMy40NDEsMC41OWMtMC43ODctMC43ODYtMi4wNjEtMC43ODYtMi44NDgsMGMtMC43ODcsMC43ODctMC43ODcsMi4wNjIsMCwyLjg0OUwyOC45NDEsMzEuNzg2eiIvPgogIDwvZz4KPC9zdmc+Cg==);
        }
        .asyncGallery__Loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            color: #fff;
            z-index: 100;
        }
        .asyncGallery__ItemDescription, .asyncGallery__Loader {
            color: #fff;
        }
        .asyncGallery__Counter {
            position: absolute;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            right: 40px;
            bottom: 40px;
        }
        .asyncGallery.is-visible {
            opacity: 1 !important;
            visibility: visible !important;
        }
        .asyncGallery__Item.is-visible {
            opacity: 1 !important;
            visibility: visible !important;
        }
        .asyncGallery__Dots {
            position: absolute;
            left: 50%;
            bottom: 40px;
            display: flex;
            margin: 0;
            padding: 0;
            transform: translateX(-50%);
            list-style-type: none;
            z-index: 1000;
        }
        .asyncGallery__Dots li {
            opacity: 0.2;
            transition: opacity 200ms;
        }
        .asyncGallery__Dots button {
            padding: 0;
            width: 10px;
            height: 10px;
            background-color: #fff;
            border: 0;
            outline: 0;
            border-radius: 50%;
        }
        .asyncGallery__Item {
            position: absolute;
            top: 50%;
            left: 50%;
            opacity: 0;
            visibility: hidden;
            overflow: hidden;
            transform: translate(-50%, -50%);
            transition: opacity 200ms, visibility 200ms;
        }
        .asyncGallery__ItemImage img {
            max-height: 80vh;
            display: block;
        }
        
         .gallery__Images{
          background-size: cover;
          background-position: center top;
          background-repeat: no-repeat;
          height: 300px;
          position: relative;
          overflow:hidden;
        }
        .gallery__Images h5{
          position: absolute;
          margin-bottom: 0px;
          bottom: -160px;
          -webkit-transition: var(--transition);
          transition: var(--transition);
        }
        .gallery__Images:hover h5{
          bottom: 0;
        }
	</style>
    <div class="page-title-area bg-27">
			<div class="container">
				<div class="page-title-content">
					<h2>University Activities</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
                            Home 
							</a>
						</li>

						<li class="active">University Activities</li>
					</ul>
				</div>
			</div>
		</div>


	<div class="clearfix"></div>
	<div class="uni_mainWrapper gallery_video_iamgesa"  style="min-height:500px;">
		<div class="container">	
            <div class="btn-group" style="margin-top:20px;margin-bottom:40px;">

                <button onclick="toggleVisibility('Menu1');" class="btn-group__item btn-group__item default-btn">Image Media</button>
                &nbsp;&nbsp; &nbsp;
                <!-- <button  onclick="toggleVisibility('Menu2');" class="btn-group__item default-btn">Video Media </button> -->
            </div>
                    <div class="row" id="Menu1">
                    <h2> Image Gallery </h2>
                    <div class="gallery university_activities">
                    <div class="row justify-content-md-center" style="width:100%; ">
                       
                        
                        <?php if(!empty($image)){ foreach($image as $get_activities_image_result){?>
                        <div class=" col-lg-4">
                            <div class="gallery__Image gallery__Images" style="background-image: url('<?=$this->Digitalocean_model->get_photo('images/university_activity/images/'.$get_activities_image_result->file)?>');" data-large="<?=$this->Digitalocean_model->get_photo('images/university_activity/images/'.$get_activities_image_result->file)?>">

                                    <h5><?=$get_activities_image_result->image_title?></h5>
                                
                            </div>
                        </div>
                        <?php }}?> 
                        </div>
                    </div>
                </div>

                <div class="row" id="Menu2" style="display:none">
                    <h2> Video Gallery </h2> 
                    <div class="gallery university_activities"> 
                        <?php if(!empty($video)){ foreach($video as $video_result){?>
                        <div class="col-lg-4">
                            <div>
                                <iframe style="width: 100%;" src="<?=$this->Digitalocean_model->get_photo('images/university_activity/video/'.$video_result->file)?>" allowfullscreen="" frameborder="0" sandbox=""></iframe>
                                <h5><?=$video_result->video_tiltle?></h5>
                            </div>
                        </div>
                        <?php }}?>
                    </div>
                </div>
	        </div>
	</div>
	
<?php include('footer.php');?>


<script> class AsyncGallery {
  constructor(settings) {
    this.settings = {
      images: ".gallery__Image",
      loop: true,
      next: undefined,
      prev: undefined,
      dots: undefined,
      close: undefined,
      loader: undefined,
      counter: undefined,
      counterDivider: "/",
      keyboardNavigation: true,
      hiddenElements: []
    };

    Object.assign(this.settings, settings);

    this.gallery = null;
    this.index = 0;
    this.items = [...document.querySelectorAll(this.settings.images)];

    this.addedItems = {};

    this.touch = {
      endX: 0,
      startX: 0
    };

    this.init();
  }

  get loading() {
    return !this.settings.hiddenElements.includes("loader");
  }

  get dotsVisible() {
    return !this.settings.hiddenElements.includes("dots");
  }

  init() {
    this.clearUncomplete();
    this.createElements();
    this.bindEvents();
  }

  clearUncomplete() {
    this.items = this.items.filter(item => {
      return item.dataset.large;
    });
  }

  createElements() {
    this.gallery = document.createElement("DIV");
    this.gallery.classList.add("asyncGallery");

    this.createSingleElement({
      element: "prev",
      type: "BUTTON",
      event: "click",
      func: this.getPrevious
    });

    this.createSingleElement({
      element: "next",
      type: "BUTTON",
      event: "click",
      func: this.getNext
    });

    this.createSingleElement({
      element: "close",
      type: "BUTTON",
      event: "click",
      func: this.closeGallery
    });

    this.createSingleElement({
      element: "loader",
      type: "SPAN",
      text: "Loading..."
    });

    this.createSingleElement({
      element: "counter",
      type: "SPAN",
      text: "0/0"
    });

    this.createSingleElement({
      element: "dots",
      type: "UL",
      text: ""
    });

    if (!this.settings.hiddenElements.includes("dots")) {
      this.items.forEach((item, i) => {
        let dot = document.createElement("LI");
        dot.dataset.index = i;
        let button = document.createElement("BUTTON");
        button.innerHTML = i;
        button.addEventListener("click", () => {
          this.index = i;
          this.getItem(i);
        });

        dot.append(button);
        this.dots.append(dot);
      });
    }

    window.document.body.append(this.gallery);
  }

  createSingleElement({ element, type, event = "click", func, text }) {
    if (!this.settings.hiddenElements.includes(element)) {
      if (!this.settings[element]) {
        this[element] = document.createElement(type);
        this[element].classList.add(
          `asyncGallery__${this.capitalizeFirstLetter(element)}`
        );
        this[element].innerHTML = text !== undefined ? text : element;
        this.gallery.append(this[element]);
      } else {
        this[element] = document.querySelector(this.settings[element]);
        this.gallery.append(this[element]);
      }

      if (func) {
        this[element].addEventListener(event, func.bind(this));
      }
    }
  }

  getItem(i, content = null) {
    let contentObj = content;
    if (contentObj === null) {
      contentObj = {};
      contentObj.src = this.items[i].dataset.large;
      contentObj.description = this.items[i].dataset.description;
    }

    if (!this.settings.hiddenElements.includes("counter")) {
      this.counter.innerHTML = `
          <span class="asyncGallery__Current">${this.index + 1}</span>${
        this.settings.counterDivider
      }<span class="asyncGallery__Current">${this.items.length}</span>
          `;
    }

    if (!this.addedItems.hasOwnProperty(i)) {
      let image = document.createElement("IMG");

      let galleryItem = document.createElement("DIV");
      galleryItem.classList.add("asyncGallery__Item");

      if (this.loading) {
        this.loader.classList.add("is-visible");
      }

      this.clearVisible();

      if (this.dotsVisible) {
        this.gallery
          .querySelector(`.asyncGallery__Dots li[data-index="${i}"]`)
          .classList.add("is-active");
      }

      image.src = contentObj.src;
      image.alt = contentObj.description ? contentObj.description : "";

      galleryItem.innerHTML = `
          <div class="asyncGallery__ItemImage">
            ${image.outerHTML}
          </div>
          `;

      if (contentObj.description) {
        galleryItem.innerHTML += `
            <div class="asyncGallery__ItemDescription">
              <p>${contentObj.description}</p>
            </div>
            `;
      }

      this.gallery.append(galleryItem);
      this.addedItems[i] = galleryItem;

      image.addEventListener("load", () => {
        this.addedItems[i].loaded = true;
        if (!this.gallery.querySelector(".asyncGallery__Item.is-visible")) {
          this.addedItems[i].classList.add("is-visible");
        }

        if (this.loading) {
          this.loader.classList.remove("is-visible");
        }
      });
    } else {
      this.clearVisible();
      if (this.addedItems[this.index].loaded) {
        this.addedItems[this.index].classList.add("is-visible");
        if (this.loading) {
          this.loader.classList.remove("is-visible");
        }
      } else if (this.loading) {
        this.loader.classList.add("is-visible");
      }

      if (this.dotsVisible) {
        this.gallery
          .querySelector(`.asyncGallery__Dots li[data-index="${i}"]`)
          .classList.add("is-active");
      }
    }

    if (!this.settings.loop) {
      if (this.index === 0) this.prev.setAttribute("disabled", true);
      else this.prev.removeAttribute("disabled");

      if (this.index === this.items.length - 1)
        this.next.setAttribute("disabled", true);
      else this.next.removeAttribute("disabled");
    }
  }

  clearVisible() {
    if (this.gallery.querySelector(".asyncGallery__Item.is-visible")) {
      this.gallery
        .querySelector(".asyncGallery__Item.is-visible")
        .classList.remove("is-visible");
    }

    if (this.gallery.querySelector(".asyncGallery__Dots li.is-active")) {
      this.gallery
        .querySelector(".asyncGallery__Dots li.is-active")
        .classList.remove("is-active");
    }
  }

  closeGallery() {
    this.gallery.classList.remove("is-visible");
    this.clearVisible();
  }

  capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

  handleGesure() {
    if (this.touch.endX > this.touch.startX + 20) {
      this.getPrevious();
    } else if (this.touch.endX < this.touch.startX - 20) {
      this.getNext();
    }
  }

  getPrevious() {
    if (this.settings.loop) {
      this.index--;
      if (this.index === -1) {
        this.index = this.items.length - 1;
      }
      this.getItem(this.index);
    } else if (this.index > 0) {
      this.index--;
      this.getItem(this.index);
    }
  }

  getNext() {
    if (this.settings.loop) {
      this.index++;
      if (this.index === this.items.length) {
        this.index = 0;
      }
      this.getItem(this.index);
    } else if (this.index < this.items.length - 1) {
      this.index++;
      this.getItem(this.index);
    }
  }

  bindEvents() {
    this.items.forEach((item, i) => {
      item.addEventListener("click", e => {
        this.gallery.classList.add("is-visible");
        this.index = i;
        this.getItem(i, {
          src: e.target.dataset.large,
          description: e.target.dataset.description
        });
      });
    });

    document.addEventListener("keyup", e => {
      if (this.gallery.classList.contains("is-visible")) {
        if (e.key === "Escape") this.closeGallery();
        if (this.settings.keyboardNavigation) {
          if (e.keyCode === 39) this.getNext();
          else if (e.keyCode === 37) this.getPrevious();
        }
      }
    });

    this.gallery.addEventListener(
      "touchstart",
      e => {
        this.touch.startX = e.changedTouches[0].screenX;
      },
      false
    );

    this.gallery.addEventListener(
      "touchend",
      e => {
        this.touch.endX = e.changedTouches[0].screenX;
        this.handleGesure();
      },
      false
    );
  }
}

new AsyncGallery();

var divs = ["Menu1", "Menu2"];
var visibleDivId = null;
function toggleVisibility(divId) {
  if(visibleDivId === divId) {
    //visibleDivId = null;
  } else {
    visibleDivId = divId;
  }
  hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
  var i, divId, div;
  div = document.getElementById(divId);
  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if(visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}
 </script>