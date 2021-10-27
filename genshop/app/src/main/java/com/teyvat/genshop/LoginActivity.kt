package com.teyvat.genshop

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.appcompat.app.AppCompatDelegate
import androidx.core.widget.doOnTextChanged
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.databinding.ActivityLoginBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios;

class LoginActivity : AppCompatActivity() {
    lateinit var binding:ActivityLoginBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.txtUsuario.doOnTextChanged { text, start, before, count -> binding.txtUsuarioLayout.isErrorEnabled = false }
        binding.txtSenha.doOnTextChanged { text, start, before, count ->  binding.txtSenhaLayout.isErrorEnabled = false  }

        //Evento Botão listar
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
        if (usuario == getString(R.string.loginTeste) && senha == getString(R.string.senhaTeste))
        {
            Sessao.token = "123456789"
            Sessao.cliente.nome = "Teste"
            Sessao.cliente.email = "Teste"
            Utilitarios.abrirTela(this, MenuActivity::class.java)
        }else
        {
            Utilitarios.snackBar(binding.root, "Credenciais Invalidas", Snackbar.LENGTH_SHORT)
        }
    }

    fun abrirCadastro(){
        //Utilitarios.abrirTela(this, CadastroActivity::class.java)
        setTheme(R.style.Theme_GenShop)
    }

    fun abrirEsqueciSenha(){
        //Utilitarios.snackBar(binding.root, "Recuperação de senha enviada ao e-mail", Snackbar.LENGTH_LONG)
        setTheme(R.style.Theme_GenShopHydro)
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