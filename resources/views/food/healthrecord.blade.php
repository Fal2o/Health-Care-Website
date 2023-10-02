<head>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>


<body>
    <nav>
        <ul>
            <li><a href="{{ route('homepage') }}">หน้าแรก</a></li>
            <li><a href="{{ route('healthrecord') }}">บันทึกสุขภาพ</a></li>
            <li><a href="{{ route('bmi') }}">คำนวณBMI</a></li>
            <li><a href="{{ route('recommend') }}">คำแนะนำ</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2 class="text-center">บันทึกการรับประทานอาหาร</h2>
        <div class="card w-75" style="margin: 0 auto">
            <div class="card-header">
                วันนี้คุณกินอะไรแล้วบ้าง?
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <form action="/healthrecord/insert" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="date" name="date" class="form-control" placeholder="วันที่"
                                id="datePicker" required>
                        </div>
                        <select class="form-select mb-3" name="menu" id="select-menu" required>
                            <option selected value="" hidden>เลือกเมนูอาหาร</option>
                            @forelse ($food as $item)
                                <option value="{{ $item->id }}" class="{{ $item->calorie }}">{{ $item->food_name }}</option>
                            @empty
                                <option value="">ไม่มีเมนูอาหาร</option>
                            @endforelse
                        </select>
                        <div>
                            <input id="calorie" value="0" class="form-control" readonly>
                        </div>
                        <button type="submit" class="btn btn-success w-25 py-2 mt-4"
                            style="margin: 0 auto; display: block;">บันทึก</button>
                    </form>
                    <hr>
                    <a href="/healthrecord/board" type="button" class="btn btn-secondary w-25 py-2"
                    style="margin: 0 auto; display: block;">แสดงข้อมูล</a></button>
                </blockquote>
            </div>
        </div>
    </div>




    <script>
        function getCurrentDate() {
            const now = new Date();
            const year = now.getFullYear();
            let month = now.getMonth() + 1;
            month = month < 10 ? '0' + month : month;
            let day = now.getDate();
            day = day < 10 ? '0' + day : day;
            return `${year}-${month}-${day}`;
        }
        const selectMenu = document.querySelector("#select-menu")
        const options = document.querySelectorAll('option')
        const calorie = document.querySelector("#calorie")
        document.getElementById('datePicker').setAttribute('max', getCurrentDate())
        document.getElementById('datePicker').value = getCurrentDate()
        selectMenu.addEventListener('change',()=>{
            for (const e of options) {
                if(e.value==selectMenu.value){
                    calorie.value = e.className
                }
            }
        })
    </script>
</body>





