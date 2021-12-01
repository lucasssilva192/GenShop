package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.core.widget.doOnTextChanged
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.databinding.ActivityLoginBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.models.Usuario
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios;
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

import android.content.Context
import com.google.gson.JsonObject
import com.teyvat.genshop.api.API
import com.teyvat.genshop.utils.UtilitariosAPI


class LoginActivity : AppCompatActivity() {
    lateinit var binding:ActivityLoginBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityLoginBinding.inflate(layoutInflater)
        Utilitarios.aplicarTema(this, delegate)
        setContentView(binding.root)

        binding.txtUsuario.doOnTextChanged { text, start, before, count -> binding.txtUsuarioLayout.isErrorEnabled = false }
        binding.txtSenha.doOnTextChanged { text, start, before, count ->  binding.txtSenhaLayout.isErrorEnabled = false  }

        //Evento Botão Logar
        binding.btnLogin.setOnClickListener(){
            if(validarFormulario()){
                this.fazerLogin()
            }
        }

        //Evento Botão Cadastrar
        binding.btnCadastro.setOnClickListener(){
            abrirCadastro()
        }

        binding.lblEsqueciSenha.setOnClickListener(){
            abrirEsqueciSenha()
        }

    }

    fun fazerLogin(){
        val usuario = binding.txtUsuario.text.toString()
        val senha = binding.txtSenha.text.toString()
        requisicaoLogin(usuario, senha)
    }

    fun requisicaoLogin(usuario: String, senha: String){
        val callback = object : Callback<Usuario> {
            override fun onResponse(call: Call<Usuario>, response: Response<Usuario>) {
                //desabilitarCarregamento()

                if(response.isSuccessful) {
                    Sessao.usuario = response.body()
                    gravarUsuarioLocal()

                    Utilitarios.abrirTela(this@LoginActivity, MenuActivity::class.java)
                }
                else {
                    Utilitarios.snackBar(binding.root, "Credenciais Invalidas", Snackbar.LENGTH_LONG)
                    Log.e("ERROR", response.body().toString())
                }
            }
            override fun onFailure(call: Call<Usuario>, t: Throwable) {
                //desabilitarCarregamento()
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }

        var requisao = JsonObject()
        requisao.addProperty("email", usuario)
        requisao.addProperty("password", senha)
        requisao.addProperty("device_name", "Android")
        API().usuario.logar(requisao).enqueue(callback)
    }

    fun gravarUsuarioLocal(){
        val usuarioPref = getSharedPreferences("UsuarioInfo", Context.MODE_PRIVATE).edit()
        usuarioPref.putString("nome", Sessao.usuario?.name)
        usuarioPref.putString("token", Sessao.usuario?.token)
        usuarioPref.putString("email", Sessao.usuario?.email)
        usuarioPref.commit()
    }

    fun abrirCadastro(){
        Utilitarios.abrirTela(this, CadastroActivity::class.java)
    }

    fun abrirEsqueciSenha(){
        Utilitarios.snackBar(binding.root, "Recuperação de senha enviada ao e-mail", Snackbar.LENGTH_LONG)
    }

    fun validarFormulario(): Boolean {
        if(binding.txtUsuario.text.isNullOrEmpty()){
            binding.txtUsuarioLayout.error = "Digite o Usuario"
            binding.txtUsuario.requestFocus()
            return false
        }
        else if(binding.txtSenha.text.isNullOrEmpty()){
            binding.txtSenhaLayout.error = "Digite a Senha"
            binding.txtSenha.requestFocus()
            return false
        }
        else {
            return true
        }
    }

}