<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"])) {
    header("Location: loginAr.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>سور القرآن</title>
  <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&display=swap" rel="stylesheet">

    <style>
      .amiri-regular {
  font-family: "Amiri", serif;
  font-weight: 400;
  font-style: normal;
}
body{
  font-family: "Amiri", serif;
  font-weight: 400;
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
    direction: rtl;
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
    font-size: 2em;
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
align-items: right;
justify-content: right;
direction: ltr;
}
.table th, .table td {
    vertical-align: middle;
    text-align: right; /* Align text to the right for RTL */
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
              <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="distroy.php">تسجيل الخروج</a></li>
              <li class="nav-item d-flex justify-content-left"><a style="color:black;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="quran.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">القرآن</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="quran.php#audio">تسجيل الصوت</a></li>
                  <li><a class="dropdown-item" href="quran.php#juze">أجزاء القرآن</a></li>
                  <li><a class="dropdown-item" href="quran.php#sura">سور القرآن</a></li>
                </ul>
              </li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                </ul>
            </div>
          <a class="logo" href="welcomAr.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
        </div>
      </nav>
    </div>
</header>
<div class="p-5 rounded-4 backbody container-fluid" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
<div class="container-fluid col-6" id="res-container">

  <!-- قسم تسجيل الصوت للطلاب -->
  <?php if ($_SESSION["role"] === "student") { ?>
    <div id="student-section">
      <h1 class="d-flex justify-content-center">تسجيل الصوت</h1>
      <table class="table table-bordered">
        <tr>
          <td><button id="start-recording" class="btn btn-primary">بدء التسجيل</button></td>
          <td><button id="stop-recording" class="btn btn-primary" style="display: none;">إيقاف التسجيل</button></td>
          <td>
            <audio id="audio-preview" class="audio-player" controls></audio>
          </td>
        </tr>
        <tr>
          <td>
            <button id="submit-audio" style="display: none;" class="btn btn-primary">إرسال للتقييم</button>
          </td>
          <td colspan="2">
            <input type="text" id="username" name="username" placeholder="اسمك" required class="form-control">
          </td>
        </tr>
      </table>
    </div>
  <?php } ?>

  <!-- قسم مراجعة الصوت للمدرسين -->
  <?php if ($_SESSION["role"] === "educator") { ?>
    <div id="educator-section">
      <h1 class="d-flex justify-content-center">تقييم تسجيلات الطلاب</h1>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>اسم الطالب</th>
              <th>التسجيل</th>
              <th>الإجراءات</th>
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
                <button class="mark-good btn btn-success" data-file="<?php echo $fileName; ?>">عمل جيد</button>
                <button class="mark-more btn btn-warning" data-file="<?php echo $fileName; ?>">يحتاج للمزيد من العمل</button>
              </td>
            </tr>
            <?php
                  }
              } else {
                  echo "<tr colspan='3' class='d-flex justify-content-center'>لا توجد ملفات صوتية للمراجعة.</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <a href="student_listAr.php"><button class="mb-2 col-12 btn btn-outline-secondary" type="button">قائمة الطلاب</button></a>
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
        alert("خطأ في الوصول إلى الميكروفون: " + error.message);
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
        alert("يرجى إدخال اسمك.");
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
        alert("خطأ في تحميل الصوت: " + error.message);
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
        alert("خطأ في التقييم: " + error.message);
      }
    });
  });
});
</script>

<h1 class=" d-flex justify-content-center">أجزاء القرآن</h1>
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
        juzName.textContent = `الجزء ${formattedNumber}`;

        juzContent.appendChild(juzName);
        juzLink.appendChild(juzContent);
        juzCard.appendChild(juzLink);
        juzContainer.appendChild(juzCard);
    }
</script></div>
<h1 class=" d-flex justify-content-center">سور القرآن</h1>
<div class="container col-8" id="surah-container">
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Define Surah list
        const surahs = [{ name: "الفاتحة" }, { name: "البقرة" }, { name: "آل عمران" }, { name: "النساء" },{ name: "المائدة" }, { name: "الأنعام" }, { name: "الأعراف" }, { name: "الأنفال" },
    { name: "التوبة" }, { name: "يونس" }, { name: "هود" }, { name: "يوسف" },{ name: "الرعد" }, { name: "إبراهيم" }, { name: "الحجر" }, { name: "النحل" },
    { name: "الإسراء" }, { name: "الكهف" }, { name: "مريم" }, { name: "طه" },{ name: "الأنبياء" }, { name: "الحج" }, { name: "المؤمنون" }, { name: "النور" },
    { name: "الفرقان" }, { name: "الشعراء" }, { name: "النمل" }, { name: "القصص" },{ name: "العنكبوت" }, { name: "الروم" }, { name: "لقمان" }, { name: "السجدة" },
    { name: "الأحزاب" }, { name: "سبأ" }, { name: "فاطر" }, { name: "يس" },{ name: "الصافات" }, { name: "ص" }, { name: "الزمر" }, { name: "غافر" },
    { name: "فصلت" }, { name: "الشورى" }, { name: "الزخرف" }, { name: "الدخان" },{ name: "الجاثية" }, { name: "الأحقاف" }, { name: "محمد" }, { name: "الفتح" },
    { name: "الحجرات" }, { name: "ق" }, { name: "الذاريات" }, { name: "الطور" },{ name: "النجم" }, { name: "القمر" }, { name: "الرحمن" }, { name: "الواقعة" },
    { name: "الحديد" }, { name: "المجادلة" }, { name: "الحشر" }, { name: "الممتحنة" },{ name: "الصف" }, { name: "الجمعة" }, { name: "المنافقون" }, { name: "التغابن" },
    { name: "الطلاق" }, { name: "التحريم" }, { name: "الملك" }, { name: "القلم" },{ name: "الحاقة" }, { name: "المعارج" }, { name: "نوح" }, { name: "الجن" },
    { name: "المزمل" }, { name: "المدثر" }, { name: "القيامة" }, { name: "الإنسان" },{ name: "المرسلات" }, { name: "النبأ" }, { name: "النازعات" }, { name: "عبس" },
    { name: "التكوير" }, { name: "الإنفطار" }, { name: "المطففين" }, { name: "الإنشقاق" },{ name: "البروج" }, { name: "الطارق" }, { name: "الأعلى" }, { name: "الغاشية" },
    { name: "الفجر" }, { name: "البلد" }, { name: "الشمس" }, { name: "الليل" },{ name: "الضحى" }, { name: "الشرح" }, { name: "التين" }, { name: "العلق" },
    { name: "القدر" }, { name: "البينة" }, { name: "الزلزلة" }, { name: "العاديات" },{ name: "القارعة" }, { name: "التكاثر" }, { name: "العصر" }, { name: "الهمزة" },
    { name: "الفيل" }, { name: "قريش" }, { name: "الماعون" }, { name: "الكوثر" },{ name: "الكافرون" }, { name: "النصر" }, { name: "المسد" }, { name: "الإخلاص" },
    { name: "الفلق" }, { name: "الناس"}];

        const surahContainer = document.getElementById('surah-container');
        
        // Get read and last visited Surahs from localStorage
        const readSurahs = JSON.parse(localStorage.getItem('readSurahs') || '[]');
        const lastVisitedSurah = localStorage.getItem('lastVisitedSurah');

        surahs.forEach((surah, index) => {
            const surahCard = document.createElement('div');
            surahCard.className = 'surah-card';

            const surahLink = document.createElement('a');
            const formattedNumber = (index + 1).toString().padStart(3, '0');
            surahLink.href = `https://quran.com/${formattedNumber}`;
            surahLink.className = 'surah-link';

            const surahContent = document.createElement('div');
            surahContent.className = 'surah-content';

            const surahName = document.createElement('div');
            surahName.className = 'surah-name-arabic';
            surahName.textContent = surah.name;

            surahContent.appendChild(surahName);
            surahLink.appendChild(surahContent);
            surahCard.appendChild(surahLink);

            // Apply background colors based on read and last visited status
            if (readSurahs.includes(index + 1)) {
                surahCard.style.backgroundColor = 'green';
            }
            if (parseInt(lastVisitedSurah) === index + 1) {
                surahCard.style.backgroundColor = 'orange';
            }

            // Add event listener to update read status and last visited on click
            surahLink.addEventListener('click', async (event) => {
                event.preventDefault();

                if (!readSurahs.includes(index + 1)) {
                    readSurahs.push(index + 1);
                    localStorage.setItem('readSurahs', JSON.stringify(readSurahs));
                }

                localStorage.setItem('lastVisitedSurah', index + 1);

                // Save to the database
                await fetch('surahHistory.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({
                        user_id: '  $_SESSION["user_id"]',  // Ensure this value is dynamically set on the server-side
                        surah_id: index + 1,
                        is_read: true,
                        last_visited: true
                    })
                });

                // Redirect after marking as read
                window.location.href = surahLink.href;
            });

            surahContainer.appendChild(surahCard);
        });
    });
</script>
</div>
</div>

<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                </ul>
                <p style="color:black;"> <a style="color:black;" class="nav-link" class="nav-link"  href="https://github.com/bochamaakram"> &copy;جميع الحقوق محفوظة 2024</a></p>
            </ul>
      </div>
    </div>
</div>
</footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
