/* let menuToggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
menuToggle.onclick = function(){
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
} */

// add active class in selected list item
let list = document.querySelectorAll(".list");
for (let i = 0; i < list.length; i++) {
  list[i].onclick = function () {
    let j = 0;
    while (j < list.length) {
      list[j++].className = "list";
    }
    list[i].className = "list active";
  };
}

const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

/* DATATABLE */

/* class DataTable {
  element;
  headers;
  items;
  copyItems;
  selected;
  pagination;
  numberOfEntries;
  headerButtons;

  constructor(selector, headerButtons) {
    this.element = document.querySelector(selector);

    this.headers = [];
    this.items = [];
    this.pagination = {
      total: 0,
      noItemsPerPage: 0,
      noPages: 0,
      actual: 0,
      pointer: 0,
      diff: 0,
      lastPageBeforeDots: 0,
      noButtonsBeforeDots: 4,
    };

    this.selected = [];
    this.numberOfEntries = 5;
    this.headerButtons = headerButtons;
  }

  parse() {
    const headers = [...this.element.querySelector("thead tr").children];
    const trs = [...this.element.querySelector("tbody tr").children];

    headers.forEach((element) => {
      this.headers.push(element.textContent);
    });

    trs.forEach((tr) => {
      const cells = [...tr.children];
      const item = {
        id: this.generateUUID(),
        value: [],
      };

      cells.forEach((cell) => {
        if (cell.children.length > 0) {
          const statusElement = [...cell.children][0];
          const status = statusElement.getAttribute("class");
          if (status != null) {
            item.values.push(`<span class='${status}'></span>`);
          }
        } else {
          item.values.push(cell.textContent);
        }
      });

      this.items.push(item);
    });

    console.log(this.items);

    this.makeTable();
  }

  makeTable() {
    this.copyItems = [...this.items];
    this.initPagination(this.items.length, this.numberOfEntries);

    const container = document.createElement("div");
    container.id = this.element.id;
    this.element.innerHTML = "";
    this.element.replaceWith(container);
    this.element = container;

    this.createHTML();
    this.renderHeaders();
    this.renderRows();
    this.renderPagesButtons();
    this.renderHeaderButtons();
    this.renderSearch();
    this.renderSelectEntries();
  }

  initPagination(total, entries) {
    this.pagination.total = total;
    this.pagination.noItemsPerPage = entries;
    this.pagination.noPages = Math.ceil(
      this.pagination.total / this.pagination.noItemsPerPage
    );
    this.pagination.actual = 1;
    this.pagination.pointer = 0;
    this.pagination.diff =
      this.pagination.noItemsPerPage -
      (this.pagination.total % this.pagination.noItemsPerPage);
  }

  generateUUID() {
    return (Date.now() * Math.floor(Math.random() * 100000)).toString();
  }

  createHTML() {
    this.element.innerHTML = `
    <div class="datatable-container">
        <div class="header-tools">
            <div class="tools">
                <ul class="header-buttons-container"></ul>
            </div>
            <div class="search">
                <input type="text" class="search-input">
            </div>
        </div>
        <table class="datatable">
            <thead>
                <tr></tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="footer-tools">
            <div class="list-items">
                Show
                <select name="n-entries" id="n-enties" class="n-entries"></select>
                entries
            </div>
            <div class="pages">
            </div>
        </div>
    </div>
    `;
  }

  renderHeaders() {
    this.element.querySelector("thead tr").innerHTML = "";

    this.headers.forEach((header) => {
      this.element.querySelector("thead tr").innerHTML = `<tr>${header}</tr>`;
    });
  }

  renderRows() {
    this.element.querySelector("tbody").innerHTML = "";

    let i = 0;
    const { pointer, total } = this.pagination;
    const limit = this.pagination.actual * this.pagination.noItemsPerPage;

    for (i = pointer; i < limit; i++) {
      if (i == total) break;

      const {id, value} = this.copyItems[i];
      const checked = this.isChecked(id);

      let data = '';

      data += `<td class="table-checkbox">
                    <input type="checkbox" class="datatable-checkbox" data-id="${id}" ${
        checked? "checked" : ""
      } />
                </td>`;

      value.forEach(cell =>{
          data += `<td>${cell}</td>`;
      });

      this.element.querySelector('tbody').innerHTML += `<tr>${data}</tr>`;

      //listener para el checkbox
      document.querySelectorAll('.datatable-checkbox').forEach(checkbox =>{
        checkbox.addEventListener('click', e=>{
            const element = e.target;
            const id = element.getAttribute('data-id');
            if (element.checked) {
                const item = this.getItem(id);
                this.selected.push(item);
            }else{
                this.removeSelected(id);
            }

            //console.log(this.selected);
        });
      });
    }
  }

  getItem(id) {
    const res = this.items.filter(item => item.id == id);
    if (res.length == 0) return null;
    return res[0];
  }

  removeSelected(id) {
      const res = this.selected.filter(item => item.id != id);
      this.selected = [... res];
  }

  renderPagesButtons() {}

  renderHeaderButtons() {}

  renderSearch() {}

  renderSelectEntries() {}

  isChecked() {
    const items = this.selected;
    let res = false;

    if (items.length == 0) return false;

    items.forEach((item) => {
      if (item.id == id) res = true;
    });
    return res;
  }
} */
