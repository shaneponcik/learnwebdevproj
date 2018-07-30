$(document).ready(function() {
  //story-plus/minus text size

  $(".glyphicon-plus").click(function() {
    var fontSizeP = parseInt($("#story-content p").css("font-size"));
    var fontSizeH2 = parseInt($("#story-content h2").css("font-size"));
    fontSizeP = fontSizeP + 1 + "px";
    fontSizeH2 = fontSizeH2 + 1 + "px";
    $("#story-content p").css({
      "font-size": fontSizeP
    });
    $("#story-content h2").css({
      "font-size": fontSizeH2
    });
  });

  $(".glyphicon-minus").click(function() {
    var fontSizeP = parseInt($("#story-content p").css("font-size"));
    var fontSizeH2 = parseInt($("#story-content h2").css("font-size"));
    fontSizeP = fontSizeP - 1 + "px";
    fontSizeH2 = fontSizeH2 - 1 + "px";
    $("#story-content p").css({
      "font-size": fontSizeP
    });
    $("#story-content h2").css({
      "font-size": fontSizeH2
    });
  });

  //make image larger
  $("#images-content img").click(function() {
    var imgSrc = $(this).attr("src");
    $("#img-place").attr("src", imgSrc);
  });



  //select result year
  $(".list-group-item").click(function() {

    var year = "20" + $(this).attr("id").substring(8, 10);
    //need to empty that container
    $("#results").html("");

    //set active and heading
    if (year == "2017") {
      $("#results-17").addClass("active");
      $("#results-18").removeClass("active");
    } else {
      $("#results-18").addClass("active");
      $("#results-17").removeClass("active");
    }
    $("#results").append("<h2>" + year + "</h2><ul>");

    //
    $.ajax({
      //ajax properties for GET
      url: "http://127.0.0.1:8887/results.xml",
      dataType: "xml",
      success: function(data) {
        $(data).find("results result").each(function() {
          var yearTag = $(this).find("year").text();
          //if the year of the result matches the year of the selected list
          if (year == yearTag) {
            var race = $(this).find("race").text();
            var place = $(this).find("place").text();

            $("#results").append("<li>" + race + ": " + place + "</li>");
          }

        });
      },
      error: function() {
        $("#results").text("Failed to retireve data.");
      }
    });
  });

});