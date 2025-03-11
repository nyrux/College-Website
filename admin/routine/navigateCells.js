document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('keydown', function (event) {
        const focusedElement = document.activeElement;
        if (focusedElement.tagName === 'INPUT') {
            const currentCell = focusedElement.closest('td');
            const row = currentCell.parentElement;
            const table = row.closest('table');
            const cells = Array.from(table.querySelectorAll('td input'));
            const index = cells.indexOf(focusedElement);

            if (event.key === 'ArrowRight' && index + 1 < cells.length) {
                cells[index + 1].focus();
                event.preventDefault();
            } else if (event.key === 'ArrowLeft' && index - 1 >= 0) {
                cells[index - 1].focus();
                event.preventDefault();
            } else if (event.key === 'ArrowDown' && row.nextElementSibling) {
                const nextRow = row.nextElementSibling;
                const nextCell = nextRow.children[currentCell.cellIndex]?.querySelector('input');
                if (nextCell) nextCell.focus();
                event.preventDefault();
            } else if (event.key === 'ArrowUp' && row.previousElementSibling) {
                const prevRow = row.previousElementSibling;
                const prevCell = prevRow.children[currentCell.cellIndex]?.querySelector('input');
                if (prevCell) prevCell.focus();
                event.preventDefault();
            }
        }
    });

    document.getElementById('clear-btn').addEventListener('click', clearRoutine);

function clearRoutine() {
    document.querySelectorAll('input[type="text"]').forEach(element => {
        element.value = "";
    });
}

    $("#saveRoutine").submit(function (event) {
        event.preventDefault();
        let routineData = {
            morning: {},
            day: {}
        };

        
        $("#morningRoutine tr:not(:first-child)").each(function (sectionIndex) {
            let sectionKey = `Section_${sectionIndex + 1}`;
            routineData.morning[sectionKey] = [];

            $(this).find("input").each(function () {
                routineData.morning[sectionKey].push($(this).val());
            });
        });

        
        $("#dayRoutine tr:not(:first-child)").each(function (sectionIndex) {
            let sectionKey = `Section_${sectionIndex + 1}`;
            routineData.day[sectionKey] = [];

            $(this).find("input").each(function () {
                routineData.day[sectionKey].push($(this).val());
            });
        });

        console.log(routineData);
        var dateInput = $('#dateInput').val();
        $.ajax({
            url: "process_routine.php",
            type: "POST",
            data: { routine: JSON.stringify(routineData), dateInput: $('#dateInput').val() },
            success: function (response) {
              $('#dateModal').val(dateInput);
                $('#modalDiv').show();
                $('#emails').val(response);
            }
        });
    });

    $('#emailModal').submit(function(event){
      event.preventDefault();
      var emails = $('#emails').val();
      const emailArray = emails.split("\n");
      $.ajax({
        url: "mailsender.php",
        type: "POST",
        data: { emails: emailArray, dateInput: $('#dateInput').val() },
        success: function (response){
          $('#modalDiv').hide();
          alert(response);
        }
      })
    })


    document.getElementById('closeModal').addEventListener('click', () => {
      $('#modalDiv').hide();
    })

    $("#dateInput").on("input", function () {
        let selectedDate = $(this).val();
        if (selectedDate) {
            $.ajax({
                url: 'fetch_routine.php',
                type: "POST",
                data: { date: selectedDate },
                success: function (response) {
                    if(response === "404"){
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
});

let weekDay = ""; 

document.getElementById('dateInput').addEventListener('input', function () {
  let selectedDate = new Date(this.value);
  let days = [sunday, monday, tuesday, wednesday, thursday, friday];
  weekDay = days[selectedDate.getDay()]; 

  console.log("Selected Day (on input change):", weekDay);
});

document.getElementById('generate-btn').addEventListener('click', () => {
  populateRoutine(weekDay);
});


function populateRoutine(week_day) {
  if (week_day.morning) {
      Object.keys(week_day.morning).forEach((section, sectionIndex) => {
          week_day.morning[section].forEach((value, periodIndex) => {
              const inputId = `morning_section${sectionIndex + 1}_period${periodIndex + 1}`;
              const inputElement = document.getElementById(inputId);
              if (inputElement) {
                  inputElement.value = value;
              }
          });
      });
  }

  if (week_day.day) {
      Object.keys(week_day.day).forEach((section, sectionIndex) => {
          week_day.day[section].forEach((value, periodIndex) => {
              const inputId = `day_section${sectionIndex + 1}_period${periodIndex + 1}`;
              const inputElement = document.getElementById(inputId);
              if (inputElement) {
                  inputElement.value = value;
              }
          });
      });
  }
}

const sunday = {
    "morning": {
      "Section_1": [
        "RY/PHY", "PP/BOT", "BN/NEP", "SKS/CHE", "", "AS/CHE", "ISJ/PHY", "BY/PHY", ""
      ],
      "Section_2": [
        "TY/PHY", "BY/PHY", "PP/BOT", "DKM/MATH", "", "KRS/MATH", "AKY/CHE", "RKY/PHY", ""
      ],
      "Section_3": [
        "AKY/CHE", "KL/ENG", "DKM/MATH", "PP/BOT", "", "ISJ/PHY", "KRS/MATH", "SB/PHY", ""
      ],
      "Section_4": [
        "BK/ENG", "TY/PHY", "SRP/MATH", "BY/PHY", "", "BN/NEP", "AS/CHE", "ISJ/PHY", ""
      ],
      "Section_5": [
        "BD/Z00", "JA/CHE", "GS/MATH", "RR/ENG", "", "KB/CHE", "SKT/CHE", "KW/NEP", ""
      ],
      "Section_6": [
        "SB/PHY", "GS/MATH", "PHY+COMP/RKT+SRS|SK+AARIT", "", "", "NJ/PHY", "BY/PHY", "JA/CHE", ""
      ],
      "Section_7": [
        "KL/ENG", "KB/CHE", "SKI/CHE", "SRP/MATH", "", "SKT/CHE", "JNY/COMP", "KRS/MATH", ""
      ],
      "Section_8": [
        "DKM/MATH", "AKY/CHE", "BD/200", "SB/PHY", "", "RY/PHY", "JS/CHE", "SKJ/CHE", ""
      ],
      "Section_9": [
        "KB/CHE", "NJ/PHY", "BY/PHY", "HB/CHE", "", "PHY+CHE/SB+RKY|1+B+SKS", "SKT/CHE", "", ""
      ]
    },
    "day": {
      "Section_1": [
        "ISJ/PHY", "VKM|JNY/Z00|COMP", "AS/CHE", "KRS/MATH", "", "BB/PHY", "RR/ENG", "KW/NEP", ""
      ],
      "Section_2": [
        "RKY/PHY", "TY/PHY", "VKM/200", "AS/CHE", "", "PP/BOT", "KW/NEP", "KB/CHE", ""
      ],
      "Section_3": [
        "VKM/Z00", "RKY/PHY", "TY/PHY", "PP/BOT", "", "KY/Z00", "PHY+CHE/SB+BB|JS+HB", "", ""
      ],
      "Section_4": [
        "SKS/CHE", "KRS/MATH", "KRK/MATH", "KY|PD/Z00|COMP", "", "BN/NEP", "PP|JNY/BOT|COMP", "SB/ENG", ""
      ]
    }
  }
  
    const monday = {
      "morning": {
        "Section_1": ["AKY/CHE", "BD/ZOO", "RY/PHY", "DKM/MATH", "", "SKY/ZOO", "ISJ/PHY", "KRS/MATH"],
        "Section_2": ["DKM/MATH", "RY/PHY", "AS/CHE", "KL/BO7", "", "ISJ/PHY", "KW/NEP", "SKS/CHE"],
        "Section_3": ["BD/ZOO", "KL/ENG", "KL/BO7", "HB/CHE", "", "RKY/PHY", "KRS/MATH", "ISJ/PHY"],
        "Section_4": ["SB/PHY", "MKY/COMP", "DKM/MATH", "SRP/MATH", "", "SKT/CHE", "BN/NEP", "JNY/COMP"],
        "Section_5": ["AS/CHE", "AKY/CHE", "SKS/CHE", "RR/ENG", "", "KRS/MATH", "JA/CHE", "RR/ENG"],
        "Section_6": ["BK/ENG", "DKM/MATH", "MKY/COMP", "AS/CHE", "", "KB/CHE", "SM/CHE", "BN/NEP"],
        "Section_7": ["KL/ENG", "HB/CHE", "GS/MATH", "KRS/MATH", "", "SM/CHE", "RKY/PHY", "KW/NEP"],
        "Section_8": ["RY/PHY", "GS/MATH", "SRP/MATH", "KB/CHE", "", "PHY+CHE/SB+DY|HB+SKS", "HB/CHE", ""],
        "Section_9": ["GS/MATH", "AS/CHE", "BOT+ZOO"]
      },
      "day": {
        "Section_1":["SKT/CHE", "KRS/MATH", "HB/CHE", "SKY/JNY/ZOO/COMP", "", "SKY/CHE", "AKY/CHE", "JN/PHY"],
        "Section_2":["ISJ/PHY", "RKV/PHY", "SB/PHY", "KRS/MATH", "", "PP/BO7", "KY/ZOO", "AKY/CHE"],
        "Section_3":["RR/ENG", "SB/PHY", "KEK/MATH", "KB/CHE", "", "KRS/MATH", "PP/BO7", "BB/PHY"],
        "Section_4":["RKY/PHY", "BN/NEP", "TY/PHY", "VKM/PD/ZOO/COMP", "", "BB/PHY", "KRS/MATH", "KB/CHE"]
      }
    };
    const tuesday = {
      "morning": {
        "Section_1":["SKS/CHE", "TY/PHY", "DKM/MATH", "RR/ENG", "", "SKT/CHE", "HB/CHE", "KRS/MATH"],
        "Section_2":["KL/ENG", "DKM/MATH", "KY/ZOO", "PP/BO7", "", "RY/PHY", "SB/PHY", "KW/NEP"],
        "Section_3":["TY/PHY", "KL/ENG", "PP/BO7", "RY/PHY", "", "BN/NEP", "KRS/MATH", "SB/PHY"],
        "Section_4":["AKY/CHE", "SKS/CHE", "SB/PHY", "DKM/MATH", "", "SB/PHY", "BN/NEP", "HB/CHE"],
        "Section_5":["KB/CHE", "RY/PHY", "CHE+COMP/KB+SKS||SK+AARIF", "", "","PHY+CHE/RKY+DY||JA+SKS", "", "SY/MATH"],
        "Section_6":["BK/ENG", "RY/PHY", "CHE+COMP/KB+SKS||SK+AARIF", "", "", "SY/MATH"],
        "Section_7":["CHE+COMP/JNY+AARIF||JA+HB", "SP//PHY", "HB/CHE", "", "", "SK/COMP", "KW/NEP", "JA/CHE"],
        "Section_8":["DKM/MATH", "KP/NEP", "BD/ZOO", "SP.PHY", "", "KB/CHE", "RR/ENG", "SKS/CHE"],
        "Section_9":["SRP/MATH", "SP/PHY", "KP/NEP", "AKY/CHE", "", "BM/ZOO", "SY/MATH", "RKY/PHY"],
      },
      "day": {
        "Section_1":["RKY/PHY", "SM/CHE", "TY/PHY", "PP/PD/BO7||COMP", "", "KRS/MATH", "KL||JNP/BO7||COMP"],
        "Section_2":["SM/CHE", "KRS/MATH", "KRK/MATH", "KY/ZOO", "", "SB/PHY", "AKT/CHE", "JN/PHY"],
        "Section_3":["JA/CHE", "HB/CHE", "BN/NEP", "SM/CHE", "", "BOT+", "KB/CHE"],
        "Section_4":["KRS/MATH", "BN/NEP", "SM/CHE", "SB/PHY", "", "BOT+ZOO+COMP/TN+PP||VKM+KY||JNY+PD", "AKY/CHE"]
      }
    };
  
    const wednesday = {
      "morning": {
        "Section_1":["SN/MATH", "BD/ZOO", "DKM/MATH", "KL/BO7", "", "BN/NEP", "KY/ZOO", "RR/ENG"],
        "Section_2":["KL/ENG", "KL/BO7", "SM/CHE", "DKM/MATH", "", "HB/CHE", "SKT/CHE", "SB/PHY"],
        "Section_3":["KL/BO7", "RY/PHY", "SN/MATH", "BY/PHY", "", "KY/ZOO", "SM/CHE", "BN/NEP"],
        "Section_4":["DKM/MATH", "MKY/COMP", "SN/MATH", "", "", "RY/PHY", "RKY/PHY", "KRS/MATH"],
        "Section_5":["SB/PHY", "BY/PHY", "PHY+CHE/RY+SNS\\JA+SKS", "", "", "SM/CHE", "KW/NEP", "SKS/CHE"],
        "Section_6":["BK/ENG", "SRP/MATH", "SB/PHY", "MKY/COMP", "", "RKY/PHY", "HB/CHE", "JNY/COMP"],
        "Section_7":["BY/PHY", "MKY/COMP", "KB/CHE", "SK/COMP", "", "PHY+CHE/RJ+SKS\\NJ+DY", "KW/NEP"],
        "Section_8":["NJ/PHY", "KB/CHE", "BY/PHY", "HB/CHE", "", "SKT/CHE", "SB/PHY", "JA/CHE"],
        "Section_9":["SRP/MATH", "SN/MATH", "KL/BO7", "BD/ZOO", "", "BM/ZOO", "KRS/MATH", "RKY/PHY"]
      },
      "day": {
        "Section_1":["KW/NEP", "KRS/MATH", "SN/MATH", "JA/CHE", "", "KB/CHE", "RR/ENG", "JN/PHY"],
        "Section_2":["ISJ/PHY", "SN/MATH", "SB/PHY", "KRS/MATH", "", "HB/CHE", "KW/NEP", "BK/ENG"],
        "Section_3":["SKS/CHE", "SB/PHY", "KRK/MATH", "BN/NEP", "", "KRS/MATH", "KL/BO7", "KB/CHE"],
        "Section_4":["JNNY/COMP", "PHY+CHE/AS+TY\\JA+HB", "SB/PHY", "", "", "BN\\NEP", "KRS/MATH", "SB/ENG"]
      }
    };
  
    const thursday = {
      "morning": {
        "Section_1":["DKM/MATH", "MCQ/", "SRP/MATH", "AS/PHY", "", "PP/BO7", "SM/CHE", "RR/ENG"],
        "Section_2":["SN/MATH", "AS/CHE", "AS/PHY", "BD/ZOO", "", "MCQ/", "SM/CHE", "RR/ENG"],
        "Section_3":["AS/CHE", "DKM/MATH", "BD/ZOO", "MCQ/", "", "AS/PHY", "PP/BO7", "BN/NEP"],
        "Section_4":["BK/ENG", "AS/CHE", "MCQ/", "DKM/MATH", "", "SKT/CHE", "KRS/MATH", "AS/PHY"],
        "Section_5":["RY/PHY", "SN/MATH", "DKM/MATH", "HAB/CHE", "", "BM/ZOO", "KW/NEP", "KRS/MATH"],
        "Section_6":["BN/NEP", "MKY/COMP", "RY/PHY", "SN/MATH", "", "JA/CHE", "SB/PHY", "HB/CHE"],
        "Section_7":["KL/ENG", "KB/CHE", "JA/CHE", "AKY/CHE", "", "PHY+COMP/RKY+DY\\JNY+PD", "KW/NEP"],
        "Section_8":["SB/PHY", "KP/NEP", "SN/MATH", "KB/CHE", "", "SM/CHE", "RR/ENG", "RKY/PHY"],
        "Section_9":["JA/CHE", "RY/PHY", "KP/NEP", "RR/ENG", "", "KB/CHE", "HB/CHE", "SB/PHY"]
      },
      "day": {
        "Section_1":["PPD\\JNY/BO7\\COMP", "VKM\\PD/ZOO\\COMP", "KRS/MATH", "SB/PHY", "", "RR/ENG", "KW/NEP", "JN/PHY"],
        "Section_2":["KW/NEP", "SKY/ZOO", "RJ/CHE", "HB/CHE", "", "KRS/MATH", "JA/CHE", "BK/ENG"],
        "Section_3":["VKM/ZOO", "SB/PHY", "SN/MATH", "KRS/MATH", "", "BN\\NEP", "RR/ENG", "KB/CHE"],
        "Section_4":["AS/PHY", "HB/CHE", "KRK/MATH", "RJR/CHE", "", "PHY+CHE/SB+AS\\RY+HB", "SB/ENG"]
      }
    };
    
    const friday = {
      "morning": {
        "Section_1":["SB/PHY", "BN/NEP", "PP/BO7", "SKY/ZOO", "", "SKT/CHE", "SM/CHE", "RR/ENG"],
        "Section_2":["KL/ENG", "SKY/ZOO", "SRP/MATH", "BY/PHY", "", "KY/ZOO", "KW/NEP", "KRS/MATH"],
        "Section_3":["SKY/ZOO", "DKM/MATH", "BY/PHY", "PP/BO7", "", "SM/CHE", "BN/NEP", "RJ/CHE"],
        "Section_4":["BK/ENG", "MKY/COMP", "RY/PHY", "DKM/MATH", "", "HB/CHE", "KRS/MATH", "BN/NEP"],
        "Section_5":["JA/CHE", "BD/ZOO", "SP/PHY", "SRP/MATH", "", "RKY/PHY", "NJ/PHY", "SY/MATH"],
        "Section_6":["BN/NEP", "AKY/CHE", "DKM/MATH", "SP/PHY", "", "SY/MATH", "RKY/PHY", "NJ/PHY"],
        "Section_7":["SN/MATH", "NNJ/PHY", "SB/PHY", "SK/COMP", "", "RY/PHY", "SY/MATH", "KW/NEP"],
        "Section_8":["PHY+CHE/RY+SNS\\KB+PS", "KB/CHE", "KP/NEP", "", "", "BM/ZOO", "HB/CHE", "SB/PHY"]
      },
      "day": {
        "Section_1":["KW/NEP", "SB/PHY", "KRK/MATH", "TY/PHY", "", "DKM/MATH", "RY/PHY", "KL/BO7"],
        "Section_2":["PS/CHEMISTRY", "TY/PHY", "KRS/MATH", "", "", "DKM/MATH", "KL/BO7", "RY/PHY"],
        "Section_3":["KRS/MATH", "BN/NEP", "SKY/ZOO", "SB/PHY", "", "PS/CHE", "DKM/MATH", "RR/ENG"],
        "Section_4":["JA/CHE", "SKY\\PD/ZOO\\COMP", "SN/MATH", "PS/CHE", "", "RY/PHY", "HB/CHE", "DKM/MATH"]
      }
    };
    