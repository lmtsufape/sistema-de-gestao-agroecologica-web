@extends('layouts.app')

@section('content')
<div class="container-inicial">
    <div>
        <div class="col-md-8">
            <div class="card">
                <h5 id="entrarLogin">Entrar</h5>

                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-md-6 col-form-label labelLogin">CPF/CNPJ</label>

                            <div class="col-md">
                                <input id="email" type="number" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-6 col-form-label labelLogin">{{ __('Senha') }}</label>

                            <div class="col-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group" id="lembrarUsuario">
                          <div class="col-md">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              </div>
                          </div>
                            <div class="col-md">
                                <div class="form-check">
                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar usuário/e-mail e senha') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary botao entrar">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                            <div class="form-group">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link esqueceuSenha" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a senha?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md"><hr></div>
                            <div class="col-md">
                                <a type="submit" href="{{route('associacao.cadastrarAssociacao')}}" class="btn btn-primary botao cadastrese">
                                    {{ __('Cadastre-se') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
