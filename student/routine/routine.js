$("#dateInput").on("input", function () {
    let selectedDate = $(this).val();
    if (selectedDate) {
        $.ajax({
            url: 'fetch_routine.php',
            type: "POST",
            data: { date: selectedDate },
            success: function (response) {
                if(response === "404" || response === "failed"){
                    clearRoutine();
                }
                else{
                    let jsonData = JSON.parse(response);
                if (jsonData.morning) {
                    Object.keys(jsonData.morning).forEach((section, sectionIndex) => {
                        jsonData.morning[section].forEach((value, periodIndex) => {
                            const inputId = `morning_section${sectionIndex + 1}_period${periodIndex + 1}`;
                            const inputElement = document.getElementById(inputId);
                            if (inputElement) {
                                inputElement.value = value;
                            }
                        });
                    });
                }

                if (jsonData.day) {
                    Object.keys(jsonData.day).forEach((section, sectionIndex) => {
                        jsonData.day[section].forEach((value, periodIndex) => {
                            const inputId = `day_section${sectionIndex + 1}_period${periodIndex + 1}`;
                            const inputElement = document.getElementById(inputId);
                            if (inputElement) {
                                inputElement.value = value;
                            }
                        });
                    });
                }
                }
                
            }
        });
    }
});
function clearRoutine() {
    document.querySelectorAll('input[type="text"]').forEach(element => {
        element.value = "";
    });
}