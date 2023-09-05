@extends('front.layouts.master')
@section('title','')
@section('bg','https://img.freepik.com/free-photo/contact-us-communication-support-service-assistance-concept_53876-128103.jpg?w=1380&t=st=1693810050~exp=1693810650~hmac=57987a2c40471dcf068dbc4b84e476d7cbd325e55f4472cf7577efe1f4aa369a')
@section('content')
    <div class="col-md-8  mx-auto">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <div class="col-md-4">
            <div class="card card-default"></div>
        </div>
        <p>Bizimle iletişime geçmek istiyorsanız lütfen aşağıdaki formu doldurunuz. Bizim için çok değerlisiniz ❣️</p>
        <form method="post" action="{{route('contact.post')}}">
            @csrf
            <div class="form-floating">
                <input class="form-control"  value="{{old('name')}}" name="name" type="text" placeholder="Ad Soyadınız"
                       data-sb-validations="required"/>
                <label for="name">Ad Soyad </label>
                <div class="invalid-feedback" data-sb-feedback="name:required">İsminiz gerekli 😊</div>
            </div>
            <div class="form-floating">
                <input class="form-control" value="{{old('email')}}" name="email" type="email" placeholder="Email adresiniz"
                       data-sb-validations="required,email"/>
                <label for="email">Email Adresi</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">Emailiniz gerekli 🙃</div>
                <div class="invalid-feedback" data-sb-feedback="email:email">Emailiniz geçerli gözükmüyor 😫</div>
            </div>
            <div class="control-group">
                <label>Konu</label>
                <div class="form-group col-xs-12  controls">
                    <select class="form-control" name="topic">
                        <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                        <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                        <option @if(old('topic')=="Genel") selected @endif>Genel</option>
                    </select>
                </div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="message" placeholder="Mesajınız" style="height: 12rem" data-sb-validations="required">
                    {{old('message')}}
                </textarea>
                <label for="message">Mesajınız 😍</label>
                <div class="invalid-feedback" data-sb-feedback="message:required">Siz değerli okurumuzun düşünceleri
                    için mesajınızı girmeniz gerekmektedir 😘💕
                </div>
            </div>
            <br/>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Tebrikler formunuz başarı ile gönderildi 👌</div>
                    <br/>
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Hatalı mesaj gönderimi 🙄</div>
            </div>
            <!-- Submit Button-->
            <button class="btn btn-primary" id="sendMessageButton" type="submit">Gönder 💌</button>
        </form>

    </div>

@endsection





