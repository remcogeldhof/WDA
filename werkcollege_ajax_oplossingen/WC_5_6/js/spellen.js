var spellen = [];

$(function () {
    $.ajax({
      url: 'data/games.xml',
      dataType: 'xml',
      success: onSuccess,
      error: function (err) {
          console.error('Fout: ', err);
      }
    });

    $('a').each(function () {
      $(this).click(function (e) {
          var l = e.target.text;
          spellen.sort(sorteerOp(l));
          vulTable();
      });
    });
});

function onSuccess(data) {
  $(data).find('game').each(function () {
      var $this = $(this);
      var spel = {};
      spel.img = $this.find('img').attr('src');
      spel.naam = $this.find('name').text();
      spel.min = $this.find('min').text();
      spel.max = $this.find('max').text();

      spellen.push(spel);
  });

  vulTable();
}

function vulTable() {
  var rows = '';
  //loop spellen array
  for (var i = 0, j = spellen.length; i < j; i++) {
      var spel = spellen[i];
      var row = '<tr>';
      row += '<td><img src="' + spel.img + '"/></td>'; //td met afbeelding
      row += '<td><h2>' + spel.naam + '</h2></td>'; //td met naam spel
      row += '<td>' + spel.min + '</td>'; //td met min spelers
      row += '<td>' + spel.max + '</td>'; //td met max spelers
      row += '</tr>';
      rows += row;
  }
  $('table tbody').html(rows);
}

function sorteerOp(property) {
  return function (a, b) {
      return (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
  };
}