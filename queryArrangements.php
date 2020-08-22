<!DOCTYPE html>

<html>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="CSS/queryArrangements.css" rel="stylesheet"/>

    </head>

    <body>

        <div class="container">
            <h1>
                Flower Arrangement Searcher
            </h1>
            <h2>
                Powered by GloryFlorist API
            </h2>
            <form action="queryArrangementsResult.php" method="POST">
                <div class="filter">
                    <div class="field">
                        <input type="checkbox" id="minPriceCheck"  value="min" name="minPriceCheck" autocomplete='off'/>
                        <label for="minPriceCheck">Set Min Price</label>

                        <div class="slider hide" id="minPrice">
                            RM10<input type="range" min="1" max="100" value="50" name="minPrice" id="minSlider" >RM1000

                        </div>

                    </div>
                    <br />
                    <br />
                    <div class="field">
                        <input type="checkbox" id="maxPriceCheck" value="max" name="maxPriceCheck" autocomplete='off'/>
                        <label for="maxPriceCheck">Set Max Price</label>

                        <div class="slider hide" id="maxPrice">
                            RM10<input type="range" min="1" max="100" value="50" name="maxPrice" id="maxSlider">RM1000

                        </div>

                    </div>
                </div>
                <input type="submit" value="Search all" id="submitBt" class="hoverableButton"/>
            </form>
        </div>
    </body>
    <script>
        var minChecked = false;
        var maxChecked = false;
        var minVal = 1000;
        var maxVal = 1000;

        $(document).ready(function () {
            isChecked();
        });

        function isChecked() {
            if (minVal > maxVal && minChecked && maxChecked) {
                // Invalid range
                $("#submitBt").prop("disabled", true);
                $("#submitBt").prop("value", "Can't search: Invalid range");
                $("#submitBt").removeClass("hoverableButton");
            } else {
                $("#submitBt").prop("disabled", false);
                $("#submitBt").addClass("hoverableButton");
                if (minChecked && maxChecked) {
                    $("#submitBt").prop("value", "Search between RM" + minVal + " and RM" + maxVal);
                } else if (minChecked) {
                    $("#submitBt").prop("value", "Search over RM" + minVal);
                } else if (maxChecked) {
                    $("#submitBt").prop("value", "Search below RM" + maxVal);
                } else {
                    $("#submitBt").prop("value", "Search all");
                }
            }


        }

        $("#minPriceCheck").change(function () {
            $("#minPrice").toggleClass("hide");

            if ($("#minPriceCheck").is(":checked")) {
                $("#minPriceView").html("Min: RM" + minVal);
                minChecked = true;
            } else {
                $("#minPriceView").html("");
                minChecked = false;
            }
            isChecked();
        });
        $("#maxPriceCheck").change(function () {
            $("#maxPrice").toggleClass("hide");

            if ($("#maxPriceCheck").is(":checked")) {
                maxChecked = true;
            } else {
                maxChecked = false;
            }
            isChecked();
        });

        $("#minSlider").mousemove(function () {
            minVal = 10 * $(this).val();
            isChecked();
        });

        $("#maxSlider").mousemove(function () {
            maxVal = 10 * $(this).val();
            isChecked();
        });

    </script>

</html>

