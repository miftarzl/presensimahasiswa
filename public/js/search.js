"use strict";

// ==========================
// SEARCH KELAS
// ==========================
const searchClass = document.getElementById("searchClass");

if (searchClass) {

    searchClass.addEventListener("keyup", function () {

        let keyword = this.value.toLowerCase();

        let rows = document.querySelectorAll("#classTable tbody tr");

        rows.forEach(function (row) {

            let text = row.innerText.toLowerCase();

            row.style.display = text.includes(keyword) ? "" : "none";

        });

    });

}


// ==========================
// SEARCH MAHASISWA
// ==========================
const searchStudent = document.getElementById("searchStudent");

if (searchStudent) {

    searchStudent.addEventListener("keyup", function () {

        let keyword = this.value.toLowerCase();

        let rows = document.querySelectorAll("#studentTable tbody tr");

        rows.forEach(function (row) {

            let text = row.innerText.toLowerCase();

            row.style.display = text.includes(keyword) ? "" : "none";

        });

    });

}


// ==========================
// SEARCH PRESENSI
// ==========================
const searchAttendance = document.getElementById("searchAttendance");

if (searchAttendance) {

    searchAttendance.addEventListener("keyup", function () {

        let keyword = this.value.toLowerCase();

        let cards = document.querySelectorAll(".attendance-card");

        cards.forEach(function (card) {

            let text = card.innerText.toLowerCase();

            card.style.display = text.includes(keyword)
                ? ""
                : "none";

        });

    });

}