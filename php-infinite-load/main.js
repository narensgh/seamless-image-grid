(function () {
  pageno = 0;
  function fetchData(pageno) {
    fetch("http://localhost/single-page/php/index.php?ajax=true&pageno=" + pageno)
    .then(function (data) {
      return data.json();
    }).then(function (data1) {
      printRecord(data1);
    })
  }

  function printRecord(records) {
    var recordsContainer = document.getElementById('records-container');
    records.nodes.forEach(record => {
      var row = printRow(record);
      recordsContainer.append(row)
    })
  }

  function printRow(row) {
    var mainRow = document.createElement('div');
    mainRow.className = "row-container";

    var leftColumn = document.createElement('div');
    leftColumn.className = "left-column";

    var image = document.createElement('img');
    image.src = '//pinkvilla.com' + row.node.field_photo_image_section;
    image.className = 'image';
    leftColumn.appendChild(image);

    var rightColumn = document.createElement('div');
    rightColumn.className = "right-column";


    var title = document.createElement('div');
    title.className = "title";
    title.innerText = row.node.title;
    rightColumn.appendChild(title);

    mainRow.appendChild(leftColumn);
    mainRow.appendChild(rightColumn);
    return mainRow;
  }
  fetchData(pageno);
  document.addEventListener('scroll', function (e) {
    var percent = (window.scrollY / document.body.offsetHeight) * 100;
    if (percent > 90) {
      pageno++;
      fetchData(pageno);
    }
  });
})()