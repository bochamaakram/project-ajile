<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quran Surah Menu</title>
  <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>
      body{
        font-family: "Urbanist", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
      }
  .about-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #0F1035;
    background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
    border-radius: 15px;
    margin: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: left;
  }
  .toggler-icon {
    width: 30px;
    height: 3px;
    background: #0F1035;
    display: block;
    transition: all 0.2s;
  }
  .middle-bar {
    margin: 5px auto;
  }

  .navbar-toggler .top-bar {
    transform: rotate(45deg);
    transform-origin: 10% 10%;
  }

  .navbar-toggler .middle-bar {
    opacity: 0;
  }

  .navbar-toggler .bottom-bar {
    transform: rotate(-45deg);
    transform-origin: 10% 90%;
  }

  .navbar-toggler.collapsed .top-bar,
  .navbar-toggler.collapsed .bottom-bar {
    transform: rotate(0);
  }

  .navbar-toggler.collapsed .middle-bar {
    opacity: 1;
  }

  .navbar-toggler.collapsed .toggler-icon {
      background: #0F1035;
  }
  .section {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .main-wrapper {
    height: 100vh;
  }
  .backbody {
      background-color: linear-gradient(135deg, #D2E9E9, #E3F4F4);
      color: #333;
      direction: rtl;
      text-align: right;
  }
  header, footer {
      background-color: #C4DFDF;
  }
  nav a.nav-link {
      color: #0F1035;
  }
  .nav-link:hover {
    transform: scale(1.02);
    color: #d1e7dd;
  }
h1 {
    padding: 20px;
    font-size: 2em;
    color: black;
}
.container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 10px;
    padding: 20px;
    max-width: 1000px;
    margin: auto;
    text-align: right;
    direction: ltr;
}
.surah-content {
  display: flex;
  align-items: center;
}
.surah-card {
    background-color: #F8F6F4;
    padding: 15px;
    border: 1px solid #365486;
    border-radius: 8px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
}
.surah-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.surah-name {
    font-weight: bold;
    color: #006699;
    margin-bottom: 5px;
    margin-right: 10px;
}
@font-face {
  font-family: 'PDMS_Saleem_QuranFont';
  src: url('PDMS_Saleem_QuranFont_shipped.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}
.surah-name-arabic {
    font-size: 1.5em;
    color: #333;
    font-family: 'PDMS_Saleem_QuranFont', sans-serif;
    src: url('PDMS_Saleem_QuranFont_shipped.ttf') format('truetype');
}
.surah-link {
    color: inherit;
    text-decoration: none;
}
.surah-audio-link .audio-player {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 10;
}
.surah-link:hover .audio-player {
display: flex;
flex-direction: column;
align-items: left;
justify-content: left;
direction: rtl;
}
.table th, .table td {
    vertical-align: middle;
    text-align: center;
}
.table th {
    background-color: #C4DFDF;
    color: #0F1035;
}
.navbar-toggler:focus{
    box-shadow: none !important;
    
}
.navbar-toggler{
    border: none !important;
}
</style>
</head>
<body>
<header>
    <div class="container-fluid"></div>
        <nav class="navbar navbar-expand-lg navbar-light navbar navbar-light ">
        <div class="container-fluid">
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
          </button>
          <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="Homepage"></a>
          <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="bookpage.php">Library</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="Prayer.html">Prayer Times</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="islam.php">Islam</a></li>
                </ul>
          </div>
        <li class="nav-item d-flex justify-content-left"><a style="color:black;" class="nav-link" href="profil.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
        <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="distroy.php">Log out</a></li>
        </div>
      </nav>
    </div>
</header>
<div class="p-5 rounded-4 backbody container-fluid" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
<div class="container-fluid col-6" id="res-container">

  <!-- Audio Recording Section for Students -->
  <?php if ($_SESSION["role"] === "student") { ?>
    <div id="student-section">
      <h1 class="d-flex justify-content-center" id="audio">Audio Recording</h1>
=======
      <h1 class="d-flex justify-content-center">Audio Recording</h1>
      <table class="table table-bordered d-flex justify-content-center">
        <tr>
          <td><button id="start-recording" class="btn btn-primary">Start Recording</button></td>
          <td><button id="stop-recording"  class="btn btn-primary"style="display: none;">Stop Recording</button></td>
          <td>
            <audio id="audio-preview"  class="audio-player" controls></audio>
          </td>
        </tr>
        <tr>
          <td>
            <button id="submit-audio" style="display: none;" class="btn btn-primary">Submit for Evaluation</button>
          </td>
          <td colspan="2">
            <input type="text" id="username" name="username" placeholder="Your name" required class="form-control">
          </td>
        </tr>
      </table>
    </div>
  <?php } ?>

  <!-- Audio Review Section for Educators -->
  <?php if ($_SESSION["role"] === "educator") { ?>
    <div id="educator-section">
      <h1 class="d-flex justify-content-center">Evaluate Student Recordings</h1>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Recording</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $targetDir = __DIR__ . "/audios/";
              $audioFiles = glob($targetDir . "*.webm");

              if (!empty($audioFiles)) {
                  foreach ($audioFiles as $file) {
                      $fileName = basename($file);
                      $parts = explode('_', $fileName);
                      $studentName = $parts[0];
            ?>
            <tr>
              <td><?php echo htmlspecialchars($studentName); ?></td>
              <td><audio controls src="audios/<?php echo $fileName; ?>"></audio></td>
              <td>
                <button class="mark-good btn btn-success" data-file="<?php echo $fileName; ?>">Good Job</button>
                <button class="mark-more btn btn-warning" data-file="<?php echo $fileName; ?>">Needs More Work</button>
              </td>
            </tr>
            <?php
                  }
              } else {
                  echo "<trcolspan='3'  class='d-flex justify-content-center'>No audio files to review.</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <a href="student_list.php"><button class="mb-2 col-12 btn btn-outline-secondary" type="button">students list</button></a>
  <?php } ?>

</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const startRecordingBtn = document.getElementById("start-recording");
  const stopRecordingBtn = document.getElementById("stop-recording");
  const audioPreview = document.getElementById("audio-preview");
  const submitAudioBtn = document.getElementById("submit-audio");
  const usernameField = document.getElementById("username");

  let mediaRecorder;
  let audioBlob;

  if (startRecordingBtn) {
    startRecordingBtn.addEventListener("click", async () => {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream, { mimeType: 'audio/webm' });

        mediaRecorder.ondataavailable = (event) => {
          audioBlob = new Blob([event.data], { type: 'audio/webm' });
          audioPreview.src = URL.createObjectURL(audioBlob);
        };

        mediaRecorder.start();
        startRecordingBtn.style.display = "none";
        stopRecordingBtn.style.display = "block";
      } catch (error) {
        alert("Error accessing microphone: " + error.message);
      }
    });

    stopRecordingBtn.addEventListener("click", () => {
      mediaRecorder.stop();
      startRecordingBtn.style.display = "block";
      stopRecordingBtn.style.display = "none";
      submitAudioBtn.style.display = "block";
    });

    submitAudioBtn.addEventListener("click", async () => {
      const username = usernameField.value.trim();
      if (!username) {
        alert("Please enter your name.");
        return;
      }

      const timestamp = Date.now();
      const filename = `${username}_${timestamp}.webm`;

      const formData = new FormData();
      formData.append("audio", audioBlob, filename);

      try {
        const response = await fetch("upload_audio.php", {
          method: "POST",
          body: formData,
        });

        const result = await response.text();
        alert(result);
      } catch (error) {
        alert("Error uploading audio: " + error.message);
      }
    });
  }

  document.querySelectorAll('.mark-good, .mark-more').forEach(button => {
    button.addEventListener('click', async (event) => {
      const fileName = event.target.getAttribute('data-file');
      const action = event.target.classList.contains('mark-good') ? 'good' : 'more';

      try {
        const response = await fetch("evaluate.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ fileName, action }),
        });

        const result = await response.text();
        alert(result);

        if (action === "good") {
          event.target.closest('tr').remove();
        }
      } catch (error) {
        alert("Error in evaluation: " + error.message);
      }
    });
  });
});
</script>

<h1 class=" d-flex justify-content-center" id="juze">Quran Juzes</h1>
<div class="container col-8" id="juz-container">
<script>
    const juzContainer = document.getElementById('juz-container');

    // Loop to create 30 Juz cards
    for (let index = 0; index < 30; index++) {
        const juzCard = document.createElement('div');
        juzCard.className = 'surah-card';

        const juzLink = document.createElement('a');
        const formattedNumber = (index + 1).toString();
        juzLink.href = `https://quran.com/juz/${formattedNumber}`;
        juzLink.className = 'surah-link';

        const juzContent = document.createElement('div');
        juzContent.className = 'surah-content';

        const juzName = document.createElement('div');
        juzName.className = 'surah-name-arabic';
        juzName.textContent = `Juz ${formattedNumber}`;

        juzContent.appendChild(juzName);
        juzLink.appendChild(juzContent);
        juzCard.appendChild(juzLink);
        juzContainer.appendChild(juzCard);
    }
</script></div>
<h1 class=" d-flex justify-content-center" id="sura">Quran Surahs</h1>
=======
<h1 class=" d-flex justify-content-center">Quran Surahs</h1>
<div class="container col-10" id="surah-container"></div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const surahContainer = document.getElementById('surah-container');
        const surahs = [
            { name: "Al-Fatihah" }, { name: "Al-Baqarah" }, { name: "Aali Imran" }, { name: "An-Nisa" },
            { name: "Al-Ma'idah" }, { name: "Al-An'am" }, { name: "Al-A'raf" }, { name: "Al-Anfal" },
            { name: "At-Tawbah" }, { name: "Yunus" }, { name: "Hud" }, { name: "Yusuf" },
            { name: "Ar-Ra'd" }, { name: "Ibrahim" }, { name: "Al-Hijr" }, { name: "An-Nahl" },
            { name: "Al-Isra" }, { name: "Al-Kahf" }, { name: "Maryam" }, { name: "Ta-Ha" },
            { name: "Al-Anbiya" }, { name: "Al-Hajj" }, { name: "Al-Mu'minun" }, { name: "An-Nur" },
            { name: "Al-Furqan" }, { name: "Ash-Shu'ara" }, { name: "An-Naml" }, { name: "Al-Qasas" },
            { name: "Al-Ankabut" }, { name: "Ar-Rum" }, { name: "Luqman" }, { name: "As-Sajda" },
            { name: "Al-Ahzab" }, { name: "Saba" }, { name: "Fatir" }, { name: "Ya-Sin" },
            { name: "As-Saffat" }, { name: "Sad" }, { name: "Az-Zumar" }, { name: "Ghafir" },
            { name: "Fussilat" }, { name: "Ash-Shura" }, { name: "Az-Zukhruf" }, { name: "Ad-Dukhan" },
            { name: "Al-Jathiyah" }, { name: "Al-Ahqaf" }, { name: "Muhammad" }, { name: "Al-Fath" },
            { name: "Al-Hujurat" }, { name: "Qaf" }, { name: "Adh-Dhariyat" }, { name: "At-Tur" },
            { name: "An-Najm" }, { name: "Al-Qamar" }, { name: "Ar-Rahman" }, { name: "Al-Waqi'a" },
            { name: "Al-Hadid" }, { name: "Al-Mujadila" }, { name: "Al-Hashr" }, { name: "Al-Mumtahina" },
            { name: "As-Saff" }, { name: "Al-Jumu'a" }, { name: "Al-Munafiqun" }, { name: "At-Taghabun" },
            { name: "At-Talaq" }, { name: "At-Tahrim" }, { name: "Al-Mulk" }, { name: "Al-Qalam" },
            { name: "Al-Haqqah" }, { name: "Al-Ma'arij" }, { name: "Nuh" }, { name: "Al-Jinn" },
            { name: "Al-Muzzammil" }, { name: "Al-Muddathir" }, { name: "Al-Qiyamah" }, { name: "Al-Insan" },
            { name: "Al-Mursalat" }, { name: "An-Naba" }, { name: "An-Nazi'at" }, { name: "Abasa" },
            { name: "At-Takwir" }, { name: "Al-Infitar" }, { name: "Al-Mutaffifin" }, { name: "Al-Inshiqaq" },
            { name: "Al-Buruj" }, { name: "At-Tariq" }, { name: "Al-A'la" }, { name: "Al-Ghashiyah" },
            { name: "Al-Fajr" }, { name: "Al-Balad" }, { name: "Ash-Shams" }, { name: "Al-Lail" },
            { name: "Ad-Duha" }, { name: "Ash-Sharh" }, { name: "At-Tin" }, { name: "Al-Alaq" },
            { name: "Al-Qadr" }, { name: "Al-Bayyina" }, { name: "Az-Zalzalah" }, { name: "Al-Adiyat" },
            { name: "Al-Qari'a" }, { name: "At-Takathur" }, { name: "Al-Asr" }, { name: "Al-Humazah" },
            { name: "Al-Fil" }, { name: "Quraish" }, { name: "Al-Ma'un" }, { name: "Al-Kawthar" },
            { name: "Al-Kafirun" }, { name: "An-Nasr" }, { name: "Al-Masad" }, { name: "Al-Ikhlas" },
            { name: "Al-Falaq" }, { name: "An-Nas" }
        ];
    document.addEventListener("DOMContentLoaded", function() {
        const surahContainer = document.getElementById('surah-container');
        const surahs = [
            { name: "Al-Fatihah" }, { name: "Al-Baqarah" }, { name: "Aali Imran" }, { name: "An-Nisa" },
            { name: "Al-Ma'idah" }, { name: "Al-An'am" }, { name: "Al-A'raf" }, { name: "Al-Anfal" },
            { name: "At-Tawbah" }, { name: "Yunus" }, { name: "Hud" }, { name: "Yusuf" },
            { name: "Ar-Ra'd" }, { name: "Ibrahim" }, { name: "Al-Hijr" }, { name: "An-Nahl" },
            { name: "Al-Isra" }, { name: "Al-Kahf" }, { name: "Maryam" }, { name: "Ta-Ha" },
            { name: "Al-Anbiya" }, { name: "Al-Hajj" }, { name: "Al-Mu'minun" }, { name: "An-Nur" },
            { name: "Al-Furqan" }, { name: "Ash-Shu'ara" }, { name: "An-Naml" }, { name: "Al-Qasas" },
            { name: "Al-Ankabut" }, { name: "Ar-Rum" }, { name: "Luqman" }, { name: "As-Sajda" },
            { name: "Al-Ahzab" }, { name: "Saba" }, { name: "Fatir" }, { name: "Ya-Sin" },
            { name: "As-Saffat" }, { name: "Sad" }, { name: "Az-Zumar" }, { name: "Ghafir" },
            { name: "Fussilat" }, { name: "Ash-Shura" }, { name: "Az-Zukhruf" }, { name: "Ad-Dukhan" },
            { name: "Al-Jathiyah" }, { name: "Al-Ahqaf" }, { name: "Muhammad" }, { name: "Al-Fath" },
            { name: "Al-Hujurat" }, { name: "Qaf" }, { name: "Adh-Dhariyat" }, { name: "At-Tur" },
            { name: "An-Najm" }, { name: "Al-Qamar" }, { name: "Ar-Rahman" }, { name: "Al-Waqi'a" },
            { name: "Al-Hadid" }, { name: "Al-Mujadila" }, { name: "Al-Hashr" }, { name: "Al-Mumtahina" },
            { name: "As-Saff" }, { name: "Al-Jumu'a" }, { name: "Al-Munafiqun" }, { name: "At-Taghabun" },
            { name: "At-Talaq" }, { name: "At-Tahrim" }, { name: "Al-Mulk" }, { name: "Al-Qalam" },
            { name: "Al-Haqqah" }, { name: "Al-Ma'arij" }, { name: "Nuh" }, { name: "Al-Jinn" },
            { name: "Al-Muzzammil" }, { name: "Al-Muddathir" }, { name: "Al-Qiyamah" }, { name: "Al-Insan" },
            { name: "Al-Mursalat" }, { name: "An-Naba" }, { name: "An-Nazi'at" }, { name: "Abasa" },
            { name: "At-Takwir" }, { name: "Al-Infitar" }, { name: "Al-Mutaffifin" }, { name: "Al-Inshiqaq" },
            { name: "Al-Buruj" }, { name: "At-Tariq" }, { name: "Al-A'la" }, { name: "Al-Ghashiyah" },
            { name: "Al-Fajr" }, { name: "Al-Balad" }, { name: "Ash-Shams" }, { name: "Al-Lail" },
            { name: "Ad-Duha" }, { name: "Ash-Sharh" }, { name: "At-Tin" }, { name: "Al-Alaq" },
            { name: "Al-Qadr" }, { name: "Al-Bayyina" }, { name: "Az-Zalzalah" }, { name: "Al-Adiyat" },
            { name: "Al-Qari'a" }, { name: "At-Takathur" }, { name: "Al-Asr" }, { name: "Al-Humazah" },
            { name: "Al-Fil" }, { name: "Quraish" }, { name: "Al-Ma'un" }, { name: "Al-Kawthar" },
            { name: "Al-Kafirun" }, { name: "An-Nasr" }, { name: "Al-Masad" }, { name: "Al-Ikhlas" },
            { name: "Al-Falaq" }, { name: "An-Nas" }
        ];

        // Get read and last visited data from localStorage
        const readSurahs = JSON.parse(localStorage.getItem('readSurahs') || '[]');
        const lastVisitedSurah = localStorage.getItem('lastVisitedSurah');

        // Get read and last visited data from localStorage
        const readSurahs = JSON.parse(localStorage.getItem('readSurahs') || '[]');
        const lastVisitedSurah = localStorage.getItem('lastVisitedSurah');

        // Create Surah cards
        surahs.forEach((surah, index) => {
            const surahCard = document.createElement('div');
            surahCard.className = 'surah-card';
        // Create Surah cards
        surahs.forEach((surah, index) => {
            const surahCard = document.createElement('div');
            surahCard.className = 'surah-card';

            const surahLink = document.createElement('a');
            const formattedNumber = (index + 1).toString().padStart(3, '0');
            surahLink.href = `https://quran.com/${formattedNumber}#verses`;
            surahLink.className = 'surah-link';
            const surahLink = document.createElement('a');
            const formattedNumber = (index + 1).toString().padStart(3, '0');
            surahLink.href = `https://quran.com/${formattedNumber}#verses`;
            surahLink.className = 'surah-link';

            const surahContent = document.createElement('div');
            surahContent.className = 'surah-content';
            const surahContent = document.createElement('div');
            surahContent.className = 'surah-content';

            const surahContent = document.createElement('div');
            surahContent.className = 'surah-content';

            const surahName = document.createElement('div');
            surahName.className = 'surah-name-arabic';
            surahName.textContent = surah.name;

            surahContent.appendChild(surahName);
            surahLink.appendChild(surahContent);
            surahCard.appendChild(surahLink);

            // Apply orange background if Surah has been read
            if (readSurahs.includes(index + 1)) {
                surahCard.style.backgroundColor = 'orange';
            }

            // Apply green background to the last visited Surah
            if (parseInt(lastVisitedSurah) === index + 1) {
                surahCard.style.backgroundColor = 'green';
            }

// Add click event to mark Surah as read and last visited
surahLink.addEventListener('click', () => {
    // Add the Surah to readSurahs if not already present
    if (!readSurahs.includes(index + 1)) {
        readSurahs.push(index + 1);
        localStorage.setItem('readSurahs', JSON.stringify(readSurahs));
    }

    // Set the current Surah as last visited
    localStorage.setItem('lastVisitedSurah', index + 1);
});
        // Save Surah read and last visited to the database
        surahLink.addEventListener('click', async () => {
            await fetch('surahHistory.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    user_id:  $_SESSION["user_id"],
                    surah_id: surahLinks,
                    is_read: true,
                    last_visited: true
                })
            });
        });

        surahContainer.appendChild(surahCard);
    });
            const surahName = document.createElement('div');
            surahName.className = 'surah-name-arabic';
            surahName.textContent = surah.name;

            surahContent.appendChild(surahName);
            surahLink.appendChild(surahContent);
            surahCard.appendChild(surahLink);

            // Apply orange background if Surah has been read
            if (readSurahs.includes(index + 1)) {
                surahCard.style.backgroundColor = 'orange';
            }

            // Apply green background to the last visited Surah
            if (parseInt(lastVisitedSurah) === index + 1) {
                surahCard.style.backgroundColor = 'green';
            }

// Add click event to mark Surah as read and last visited
surahLink.addEventListener('click', () => {
    // Add the Surah to readSurahs if not already present
    if (!readSurahs.includes(index + 1)) {
        readSurahs.push(index + 1);
        localStorage.setItem('readSurahs', JSON.stringify(readSurahs));
    }

    // Set the current Surah as last visited
    localStorage.setItem('lastVisitedSurah', index + 1);
});
        // Save Surah read and last visited to the database
        surahLink.addEventListener('click', async () => {
            await fetch('surahHistory.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    user_id:  $_SESSION["user_id"],
                    surah_id: surahLinks,
                    is_read: true,
                    last_visited: true
                })
            });
        });

        surahContainer.appendChild(surahCard);
    });
});
</script>
</div>
</div>
</div>

<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav nav-underline">
                <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="bookpage.php">Library</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="Prayer.html">Prayer Times</a></li>
                </ul>
                <hr style="color:black;" class="featurette-divider">
                <p style="color:black;"> <a style="color:black;" class="nav-link" class="nav-link"  href="https://github.com/bochamaakram">&copy; 2024 All rights reserved</a></p>
            </ul>
      </div>
    </div>
  </div>
</footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
