@extends('app')


@section('content')
<section id="home" class="naked">
    <div class="fullscreenbanner-container revolution">
        <div class="fullscreenbanner">
            <ul>
                <li data-transition="fade">
                    <img src="{{asset('style/images/back.jpg')}}"  alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="repeat">
                    <h1 style="margin-top: -25px" class="tp-caption caption large sfb" data-x="center" data-y="center" data-voffset="-25" data-speed="900" data-start="1000" data-endspeed="100" data-easing="Sine.easeOut">Hello! Welcome to my website</h1>
                    <div style="margin-top: -25px" class="tp-caption small tp-fade fadeout tp-resizeme" data-x="center" data-y="center" data-voffset="25" data-speed="100"
                    data-start="1500"
                    data-easing="Power4.easeOut"
                    data-splitin="chars"
                    data-splitout="chars"
                    data-elementdelay="0.03"
                    data-endelementdelay="0"
                    data-endspeed="100"
                    data-endeasing="Power1.easeOut"
                    style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">My name is Mike Santos, i'm a web & mobile developer</div>
                    <div class="arrow smooth"><a href="#about"><i class="icon-down-open-big"></i></a></div>
                </li>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</section>

<div class="container">
    <section id="about">
        <div class="box">
            <h2 class="section-title">About me</h2>
            <div class="row">
                <!-- <div class="col-md-5 col-md-push-7 col-sm-12">
                    <figure class="frame"><img src="style/images/art/about.jpg" alt="" /></figure>
                </div> -->
                <div class="col-sm-12">
                    <p class="lead">
                        Hi, my name is Mike Santos, i have 20(twenty) years old, i'm brazilian, currently i study Computer Science, Computer engineering and database in college (triple graduation).
                    </p>
                    <p>
                        I already developer there is 11 (eleven) years. I have 7 years of experience working as developer. I started with web development. Currently i study new tecnologies with JavaScript, I'm professionalizing in the areas of JavaScript, like NodeJS, VueJS, ReactJS. Currently i use Ionic Framework, Quasar Framework and Laravel Framework to web and mobile development.
                    </p>
                    <p>

                    </p>
                    <p>

                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="divide40"></div>
            <h2 class="section-title">My Skills</h2>
            <div class="divide10"></div>
            <div class="services-1">
                <div class="row">

                    @php
                        $counter = 0;
                    @endphp

                    @foreach($skills as $skill)
                        @if($counter == 4)
                            <div class="divide30"></div>
                            @php
                                $counter = 0;
                            @endphp
                        @else
                            @php
                                $counter++;
                            @endphp
                        @endif
                        <div class="col-md-3 col-sm-6">
                            <div class="icon">
                                <i class="devicon-{{$skill['icon']}}-plain font40"></i>
                            </div>
                            <div class="text">
                                <h5>{{$skill['name']}}</h5>
                                <p>{{$skill['experience']}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="box">
            <h2 class="section-title">Get in Touch with Me</h2>
            <div class="divide20"></div>
            <div class="row text-center services-2">
                <div class="col-md-4 col-sm-6">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <p>
                        +1 (209) 210-4976 <br>
                        +55 (92) 9 9410-2220
                    </p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    <p>
                        +1 (209) 210-4976 <br>
                        +55 (92) 9 9410-2220
                    </p>
                </div>
                <div class="col-md-4 col-sm-6"> <i class="budicon-mail"></i>
                    <p>
                        <a class="nocolor" href="mailto:contato.mikesantos@gmail.com">contato.mikesantos@gmail.com</a> <br />
                        <a class="nocolor" href="mailto:mike@storedev.net">mike@storedev.net</a>
                    </p>
                </div>
            </div>
            <div class="divide30"></div>
            <div class="form-container">
                <div class="response alert alert-success"></div>
                <form class="forms" action="{{route('api.mail.contact')}}" method="post">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-row text-input-row name-field">
                                    <label>Name</label>
                                    <input type="text" name="name" class="text-input defaultText required"/>
                                </div>
                                <div class="form-row text-input-row email-field">
                                    <label>Email</label>
                                    <input type="text" name="email" class="text-input defaultText required email"/>
                                </div>
                                <div class="form-row text-input-row subject-field">
                                    <label>Subject</label>
                                    <input type="text" name="subject" class="text-input defaultText required"/>
                                </div>
                            </div>
                            <div class="col-sm-6 lp5">
                                <div class="form-row text-area-row">
                                    <label>Message</label>
                                    <textarea name="message" class="text-area required"></textarea>
                                </div>
                                <div class="form-row hidden-row">
                                    <input type="hidden" name="hidden" value="" />
                                </div>
                                <div class="nocomment">
                                    <label for="nocomment">Leave This Field Empty</label>
                                    <input id="nocomment" value="" name="nocomment" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="button-row pull-right">
                                    <input type="submit" value="Send Message" name="submit" class="btn btn-submit bm0" />
                                </div>
                            </div>
                            <div class="col-sm-6 lp5">
                                <div class="button-row pull-left">
                                    <input type="reset" value="Clear all" name="reset" class="btn btn-submit bm0" />
                                </div>
                            </div>
                            <input type="hidden" name="v_error" id="v-error" value="Required" />
                            <input type="hidden" name="v_email" id="v-email" value="Enter a valid email" />
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
