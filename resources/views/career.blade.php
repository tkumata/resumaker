<html>
<head>
<link rel="stylesheet" href="{{ url('/') }}/css/career.css">
</head>

<body>
    <section class="page" style="z-index: 1;">
        <div id="page-1">
            <h1 class="title">職 務 経 歴 書</h1>
            <div class="now">{{ $user->updated_at == "" ? $user->created_at->format('Y/m/d'):$user->updated_at->format('Y/m/d') }} 現在</div>
            <div class="user_name">{{ $user->name }}</div>
        </div>

        <div class="head">職務経歴</div>
        <table>
            <tr><th>会社</th><th>日付</th><th>職務内容</th></tr>
            @foreach ($resumes as $resume)
            <tr>
                <td class="date">
                    <div>
                        {{ $resume->resumes_date->format('Y年 m月') }}
                    </div>
                </td>
                <td class="org_name">
                    <div>
                        <?php
                            $company_name = preg_replace("/入社/", '', $resume->resumes_organization_name);
                        ?>
                        {{ $company_name }}
                    </div>
                </td>
                <td class="detail">
                    <div>
                        {!! nl2br($resume->resumes_detail) !!}
                    </div>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="head">その他</div>
        @foreach ($notes as $note)
        <div class="notes">
            {!! nl2br($note->careers_notes) !!}
        </div>
        @endforeach

        <div class="end">以上</div>
    </section>
</body>
</html>
