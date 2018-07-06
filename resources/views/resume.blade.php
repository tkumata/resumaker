<html>
<head>
    <link rel="stylesheet" href="{{ url('/') }}/css/resume.css">
</head>

<body>
    <section class="page" style="z-index: 1;">
    <svg
        id="svg-page-1"
        width="182mm"
        height="257mm"
        viewBox="0 0 182 257">

        <g id="line" transform="translate(17,22)">
            <g>
                <path
                    stroke="black" stroke-width="0.8" fill="none"
                    d="m 0,0 h 96 v 38 h 52 v 28 h -148 v -66 z"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none" stroke-dasharray="1.5"
                    d="m 106,-8 h 30 v 40 h -30 v -40 z"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none" stroke-dasharray="1.5"
                    d="m 0,6 h 82"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 82,6 h 14"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 82,0 v 20"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,20 h 96"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,26 h 96"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 48,26 v 6"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,32 h 96"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,38 h 96"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none" stroke-dasharray="1.5"
                    d="m 0,52 h 148"/>
            </g>
            
            <g transform="translate(0,76)">
                <path
                    stroke="black" stroke-width="0.8" fill="none"
                    d="m 0,0 h 148 v 146 h -148 v -146 z"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none" stroke-dasharray="1.5"
                    d="m 18,0 v 146"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 32,0 v 146"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,6 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,16 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,26 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,36 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,46 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,56 h 148"/>
                                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,66 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,76 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,86 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,96 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,106 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,116 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,126 h 148"/>
                <path
                    stroke="black" stroke-width="0.5" fill="none"
                    d="m 0,136 h 148"/>
            </g>
        </g>
    </svg>
    <div id="page-1">
        <h1>履 歴 書</h1>
        @if ($user->img_path)
        <img class="photo" src="{{ url('/') }}/profilepics/{{ $user->img_path }}" alt="写真" />
        @else
        <img class="photo" src="{{ url('/') }}/person_default.png" alt="写真" />
        @endif
        <div class="name">
            <h2>氏名</h2>
            <span>{{ $user->name }}</span>
        </div>
        <div class="name-kana">
            <h2>フリガナ</h2>
            <span>{{ $user->name_kana }}</span>
        </div>
        <div class="gender">
            <h2>性別</h2>
            <span>{{ $user->gender }}</span>
        </div>
        <div class="birthday">
            <h2>生年月日</h2>
            <span>{{ $user->birthday->format('Y年m月d日') }}（満{{ $user->birthday->age }}才）</span>
        </div>
        <div class="cellphone-num">
            <h2>携帯番号</h2>
            <span>{{ $user->tel2 }}</span>
        </div>
        <div class="tellephone-num">
            <h2>電話番号</h2>
            <span>{{ $user->tel1 }}</span>
        </div>
        <div class="e-mail">
            <h2>E メール</h2>
            <span>{{ $user->email }}</span>
        </div>
        <div class="address">
            <h2>住所</h2>
            <div class="address-num">(〒 {{ $user->zip }})</div>
            <span>{{ $user->address }}</span>
        </div>

        <div class="history">
            <table>
                <tr><th>年</th><th>月</th><th>学歴・職歴</th></tr>

                <tr><td></td><td></td><td><h3>学歴</h3></td></tr>
                @if (empty($resumes_schools))
                <tr><td></td><td></td><td>なし</td></tr>
                @else
                @foreach ($resumes_schools as $resumes_school)
                <?php
                $year = date('Y', strtotime($resumes_school->resumes_date));
                $month = date('m', strtotime($resumes_school->resumes_date));
                ?>
                <tr><td>{{ $year }}</td><td>{{ $month }}</td><td>{{ $resumes_school->resumes_organization_name }}</td></tr>
                @endforeach
                @endif

                <tr><td></td><td></td><td><h3>職歴</h3></td></tr>
                @if (empty($resumes_companies))
                <tr><td></td><td></td><td>なし</td></tr>
                @else
                @foreach ($resumes_companies as $resumes_company)
                <?php
                $year = date('Y', strtotime($resumes_company->resumes_date));
                $month = date('m', strtotime($resumes_company->resumes_date));
                ?>
                <tr><td>{{ $year }}</td><td>{{ $month }}</td><td>{{ $resumes_company->resumes_organization_name }}</td></tr>
                @endforeach
                @endif

                <tr><td></td><td></td><td><div class="table-lastline">以上</div></td></tr>
            </table>
        </div>

    </div>
</section>

<section class="page" style="z-index : 0;">
<svg
    id="svg-page-2"
    width="182mm"
    height="257mm"
    viewBox="0 0 182 257">
    
    <g id="line" transform="translate(17,22)">
        <g>
            <path
                stroke="black" stroke-width="0.8" fill="none"
                d="m 0,0 h 148 v 80 h -148 v -80 z"/>
            <path
                stroke="black" stroke-width="0.5" fill="none" stroke-dasharray="1.5"
                d="m 18,0 v 66"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 32,0 v 66"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,6 h 148"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,16 h 148"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,26 h 148"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,36 h 148"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,46 h 148"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,56 h 148"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,66 h 148"/>
        </g>
        <g transform="translate(0,84)">
            <path
                stroke="black" stroke-width="0.8" fill="none"
                d="m 0,0 h 148 v 34 h -148 v -34 z"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 74,0 v 34 z"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,6 h 148"/>
        </g>
        <g transform="translate(0,122)">
            <path
                stroke="black" stroke-width="0.8" fill="none"
                d="m 0,0 h 148 v 28 h -148 v -28 z"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,6 h 148"/>
        </g>
        <g transform="translate(0,154)">
            <path
                stroke="black" stroke-width="0.8" fill="none"
                d="m 0,0 h 148 v 44 h -148 v -44 z"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,6 h 148"/>
        </g>
        <g transform="translate(0,204)">
            <path
                stroke="black" stroke-width="0.8" fill="none"
                d="m 0,0 h 148 v 18 h -148 v -18 z"/>
            <path
                stroke="black" stroke-width="0.5" fill="none"
                d="m 0,6 h 148"/>
        </g>
    </g>
</svg>

    <div id="page-2">
        <div class="license">
            <table>
                <tr><th>年</th><th>月</th><th>免許・資格</th></tr>
                @foreach ($licenses as $license)
                <?php
                $year = date('Y', strtotime($license->license_date));
                $month = date('m', strtotime($license->license_date));
                ?>
                <tr><td>{{ $year }}</td><td>{{ $month }}</td><td>{{ $license->license_detail }}</td></tr>
                @endforeach
            </table>
            <div>
                <p></p>
            </div>
        </div>

        <div class="hobby">
            <h2>趣味</h2>
            <div>
                @if ($others)
                <p>{{ $others->others_hobby }}</p>
                @else
                <p></p>
                @endif
            </div>
        </div>
        
        <div class="skill">
            <h2>特技</h2>
            <div>
                @if ($others)
                <p>{{ $others->others_special }}
                @else
                <p></p>
                @endif
            </div>
        </div>
        
        <div class="reason">
            <h2>志望動機</h2>
            <div>
                @if ($others)
                <p>{{ $others->others_reason }}</p>
                @else
                <p></p>
                @endif
            </div>
        </div>
        
        <div class="selling-point">
            <h2>自己アピール</h2>
            <div>
                @if ($others)
                <p>{{ $others->others_pr }}</p>
                @else
                <p></p>
                @endif
            </div>
        </div>
        
        <div class="treatment">
            <h2>希望</h2>
            <div>
                @if ($others)
                <p>{{ $others->others_expectation }}</p>
                @else
                <p></p>
                @endif
            </div>
        </div>
    </div>
</section>

</body>
</html>
