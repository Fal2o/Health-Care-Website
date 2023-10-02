<head>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    }
    
    
    .container {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 2em;
    
    
    }
    
    
    .article-box {
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
    background-color: #fff;
    border: 1px solid #ddd;
    }
    .article-box img{
    width: 100%;
    height: 150px;
    object-fit: cover;
    }
    .article-box a{
    text-decoration: none;
    color: #000000
    }
    
    
    .article-box:hover {
    background-color: #f9f9f9;
    }
    .cover img{
    display: block;
    width: 100%;
    height: 480px;
    object-fit: cover;
    
    
    
    
    
    
    }
    </style>
    </head>
    <nav>
    <ul>
    <li><a href="{{ route('homepage') }}">หน้าแรก</a></li>
    <li><a href="{{ route('healthrecord') }}">บันทึกสุขภาพ</a></li>
    <li><a href="{{ route('bmi') }}">คำนวณBMI</a></li>
    <li><a href="{{ route('recommend') }}">คำแนะนำ</a></li>
    
    
    </ul>
    </nav>
    
    
    <body>
    <div class="cover">
    <img src="{{asset('images/cover.jpeg')}}" alt="ปก" >
    </div>
    <div class="container">
    <!-- กล่องบทความสุขภาพที่ 1 -->
    <div class="article-box">
    <a href="https://women.trueid.net/detail/ywn1pK0JP4X8">
    <img img src="{{ asset('images/1.jpeg') }}" alt="บทความสุขภาพ 1" style="width: 100%; ">
    <p>อยากกินอาหารคลีนแต่ก็ขี้เกียจทำอาหารใครเป็นแบบนี้บ้างเอ่ยใครที่เป็นสายขี้เกียจทำอาหารแบบนี้
    ตามเรามาทางนี้เลยค่าวันนี้เรามีเมนูอาหารคลีน2566</p>
    
    
    </a>
    </div>
    
    
    <!-- กล่องบทความสุขภาพที่ 2 -->
    <div class="article-box">
    <a href="https://library.wu.ac.th/km/%e0%b8%ad%e0%b8%b2%e0%b8%ab%e0%b8%b2%e0%b8%a3%e0%b9%80%e0%b8%9e%e0%b8%b7%e0%b9%88%e0%b8%ad%e0%b8%aa%e0%b8%b8%e0%b8%82%e0%b8%a0%e0%b8%b2%e0%b8%9e-%e0%b8%81%e0%b8%b4%e0%b8%99%e0%b8%ad%e0%b8%a2%e0%b9%88/?fbclid=IwAR3kxAgNhspPNkk9GHvrdy_FmbLH1pKfn_F6DKLScKV6MCNIE3nb96nzDpU">
    <img src="{{ asset('images/2.jpeg') }}" alt="บทความสุขภาพ 2" style="width: 100%;">
    
    
    <p>การกินอาหารเพื่อสุขภาพเป็นการเลือกกินอาหารให้หลากหลายและครบ 5 หมู่ในปริมาณที่เหมาะสม ซึ่งจะทำให้ร่างกายได้รับสารอาหารที่เพียงพอต่อความต้องการในแต่ละวัน การกินอาหารที่มีประโยชน์เป็นปัจจัยสำคัญที่ช่วยเสริมสร้างสุขภาพให้แข็งแรง</p>
    
    
    </a>
    </div>
    
    
    <!-- กล่องบทความสุขภาพที่ 3 -->
    <div class="article-box">
    <a href="https://www.sanook.com/health/11493/">
    <img src="{{asset('images/4.jpeg')}}" alt="บทความสุขภาพ 3">
    
    
    <p>คาร์ดิโอ VS เวทเทรนนิ่ง เราเหมาะกับการออกกำลังกายแบบไหน? ไม่ว่าจะเป็นการออกกำลังกายประเภทใด ด้วยวิธีไหน ก็ส่งผลดีต่อร่างกายได้ทั้งนั้น เพียงแต่หากเรามีความกังวลในเรื่องของผลลัพธ์ที่จะเกิดขึ้น ว่าเป็นไปอย่างที่เราตั้งใจหรือไม่</p>
    </a>
    </div>
    
    
    <!-- กล่องบทความสุขภาพที่ 4 -->
    <div class="article-box">
    <a href="https://www.phyathai.com/th/article/2380-%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B8%A0%E0%B8%B2%E0%B8%9E%E0%B8%94%E0%B8%B5%E0%B9%84%E0%B8%A1%E0%B9%88%E0%B8%A2%E0%B8%B2%E0%B8%81_%E0%B9%81%E0%B8%84?fbclid=IwAR3gVVSxlJBrpIQpAZCgzzJuNTcj-z9b188THvU8Gwc01CLTpR9KXkKbliA">
    <img src="{{asset('images/5.jpeg')}}" alt="บทความสุขภาพ 4">
    <p>สร้างสุขภาพดีไม่ยาก แค่ปรับการใช้ชีวิตประจำวันให้ถูกหลัก สนับสนุนให้คนไทยใส่ใจกับการสร้างสุขภาพที่ดี ด้วยเทคนิคการดูแลสุขภาพในหนึ่งวัน เทคนิคที่จะช่วยให้การสร้างสุขภาพที่ดี…ไม่ว่าใครก็ทำได้ ง่ายนิดเดียว!</p>
    
    
    </a>
    </div>
    
    
    <!-- กล่องบทความสุขภาพที่ 5 -->
    <div class="article-box">
    <a href="https://hhcthailand.com/exercise-techniques/?fbclid=IwAR3uEBXdAdmRITAcC3ivL4bzS88qYGFVD8q931eBdFEmQM0iuHrClUm5j_M">
    <img src="{{asset('images/7.jpeg')}}" alt="บทความสุขภาพ 5">
    
    
    <p>การออกกําลังกายเพื่อสุขภาพคือแนวทางการดูแลสุขภาพตัวเองที่เป็นที่นิยมอย่างมากในกลุ่มคนหนุ่มสาว รวมไปถึงวัยกลางคนและวัยสูงอายุที่ต้องการให้ตัวเองมีสุขภาพที่ดีอยู่เสมอ แต่จะมีสักกี่คนที่รู้ว่าแท้จริงแล้วประโยชน์การออกกำลังกายคืออะไร แล้วการออกกําลังกายเพื่อสุขภาพให้มีประสิทธิภาพนั้นมีเทคนิคอะไรที่เราต้องรู้บ้าง</p>
    
    
    </a>
    </div>
    
    
    <!-- กล่องบทความสุขภาพที่ 6 -->
    <div class="article-box">
    <a href="https://www.petcharavejhospital.com/en/Article/article_detail/How-do-you-do-your-first-period?fbclid=IwAR0lgg6adBwS4ZfWTvg76RLf8D45_7FUmgMu1wgMqS_Ug3rJXh6iyBxkjTU">
    <img src="{{asset('images/8.jpeg')}}" alt="บทความสุขภาพ 6">
    
    
    <p>ประจำเดือน เป็นสิ่งที่บอกถึงการเปลี่ยนแปลงทางร่างกายของเพศหญิงว่าเข้าสู่วัยเจริญพันธุ์ โดยจะเริ่มเป็นประจำเดือนครั้งแรก เมื่ออายุประมาณ 12-13 ปี และจะหมดประจำเดือนในช่วงอายุประมาณ 45-60 ปี ฉะนั้นจะต้องเตรียมรับมือกับประจำเดือน และเตรียมความพร้อมเมื่อเข้าสู่วัยรุ่นของผู้หญิง</p>
    
    
    </a>
    </div>
    
    
    <!-- กล่องบทความสุขภาพที่ 7 -->
    <div class="article-box">
    <a href="https://www.sikarin.com/health/pms">
    <img src="{{asset('images/9.jpeg')}}" alt="บทความสุขภาพ 7">
    
    
    <p>ประจำเดือนเป็นสิ่งที่เกิดขึ้นกับผู้หญิงเราทุกคนเมื่อเริ่มเข้าสู่วัยเจริญพันธุ์ ตั้งแต่อายุ 12 ปีขึ้นไป โดยประจำเดือนในช่วง 2 ปีแรกนั้นมักจะมาไม่สม่ำเสมอเพราะการผลิตฮอร์โมนยังไม่สมดุล ปกติแล้วผู้หญิงจะมีรอบเดือนห่างกันทุก ๆ 28 – 33วัน (ขึ้นอยู่กับแต่ละคน) และมีประจำเดือนเฉลี่ยคือ 6 วัน</p>
    
    
    </a>
    </div>
    <!-- กล่องบทความสุขภาพที่ 8 -->
    <div class="article-box">
    <a href="https://w1.med.cmu.ac.th/otolaryngology/km/sleep-hygiene/">
    <img src="{{asset('images/10.jpeg')}}" alt="บทความสุขภาพ 8">
    
    
    <p>สุขอนามัยการนอน (Sleep hygiene) เรื่องง่ายๆ ที่อาจถูกมองข้ามการนอนหลับที่ดีจะทำให้ร่างกายเราได้พักผ่อนอย่างเต็มที่ และมีพลังพร้อมที่จะทำกิจกรรมในวันต่อไป คนเราใช้เวลาหนึ่งในสามของวันไปกับการนอน รู้หรือไม่ว่าพฤติกรรมบางอย่างระหว่างวัน โดยเฉพาะช่วงเวลาก่อนนอนอาจส่งผลต่อสุขภาพการนอนของเราได้</p>
    
    
    </a>
    </div>
    </div>
    

  
    
    
    
    