@if($poll)
    <div class="right-single2">
        <div class="section-head">
            <span><a href="#">অনলাইন ভোট</a></span>
        </div>
        <div class="wrapper">
            <p>{{ $poll->description }}</p>
            <form action="{{route('vote', $poll->id)}}" method="post">
                @csrf
            <div class="poll-area">
                <input type="checkbox" value="1" name="poll" id="opt-1">
                <input type="checkbox" value="2" name="poll" id="opt-2">
                <input type="checkbox" value="3" name="poll" id="opt-3">
                <label for="opt-1" class="opt-1">
                    <div class="row">
                        <div class="column">
                            <span class="circle"></span>
                            <span class="text">হ্যাঁ</span>
                        </div>

                    </div>
                </label>
                <label for="opt-2" class="opt-2">
                    <div class="row">
                        <div class="column">
                            <span class="circle"></span>
                            <span class="text">না</span>
                        </div>

                    </div>

                </label>
                <label for="opt-3" class="opt-3">
                    <div class="row">
                        <div class="column">
                            <span class="circle"></span>
                            <span class="text">মতামত নেই</span>
                        </div>

                    </div>

                </label>
                <div class="text-center mt-4">
                    <button type="submit" class="poll_button">ভোট দিন</button>
                </div>
            </div>
            </form>
        </div>
    </div>

{{--    js for frontend--}}
    <script>
        const options = document.querySelectorAll("label");
        for (let i = 0; i < options.length; i++) {
            options[i].addEventListener("click", () => {
                for (let j = 0; j < options.length; j++) {
                    if (options[j].classList.contains("selected")) {
                        options[j].classList.remove("selected");
                    }
                }

                options[i].classList.add("selected");
                for (let k = 0; k < options.length; k++) {
                    options[k].classList.add("selectall");
                }

                let forVal = options[i].getAttribute("for");
                let selectInput = document.querySelector("#" + forVal);
                let getAtt = selectInput.getAttribute("type");
                if (getAtt == "checkbox") {
                    selectInput.setAttribute("type", "radio");
                } else if (selectInput.checked == true) {
                    options[i].classList.remove("selected");
                    selectInput.setAttribute("type", "checkbox");
                }

                let array = [];
                for (let l = 0; l < options.length; l++) {
                    if (options[l].classList.contains("selected")) {
                        array.push(l);
                    }
                }
                if (array.length == 0) {
                    for (let m = 0; m < options.length; m++) {
                        options[m].removeAttribute("class");
                    }
                }
            });
        }
    </script>
@endif


<div class="right-single2">
    <div class="">

        <div class="" style="width: 300px; height: 250px;">
            @foreach($ads as $ad)
                @if($ad->placement_id == 4 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image') && $ad->type  == 'Internal')
                    <a style="width: 100%;" href="{{$ad->link}}" target="_blank">
                        <img style="margin: 0 auto;" src="{{asset('storage')}}/{{$ad->file}}" alt="Ad Image">
                    </a>
                @endif
                @if($ad->placement_id == 4 && $ad->file_type == "Video" && $ad->type  == 'Internal')
                    <a style="width: 100%;" target="_blank" href="{{$ad->link}}">
                        <video src="{{asset('storage')}}/{{$ad->file}}"></video>
                    </a>
                @endif
                @if($ad->placement_id == 4 && $ad->type == 'External')
                    {!! $ad->code !!}
                @endif
            @endforeach

        </div>
    </div>
    </div>

