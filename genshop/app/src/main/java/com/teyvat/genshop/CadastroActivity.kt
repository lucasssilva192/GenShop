package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.core.widget.doOnTextChanged
import com.google.android.material.textfield.TextInputLayout
import com.teyvat.genshop.databinding.ActivityCadastroBinding
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios


class CadastroActivity : AppCompatActivity() {
    lateinit var binding: ActivityCadastroBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityCadastroBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.txtUsuario.doOnTextChanged{ text, start, before, count -> binding.txtUsuarioLayout.isErrorEnabled = false  }
        binding.txtEmail.doOnTextChanged{ text, start, before, count -> binding.txtEmailLayout.isErrorEnabled = false  }
        binding.txtSenha.doOnTextChanged{ text, start, before, count -> binding.txtSenhaLayout.isErrorEnabled = false  }
        binding.txtConfirmarSenha.doOnTextChanged{ text, start, before, count -> binding.txtConfirmarSenhaLayout.isErrorEnabled = false  }

        //Evento Botões
        binding.btnCadastrar.setOnClickListener() {
            if(validarFormulario()){
                cadastrar()
            }
        }

        binding.btnCancelar.setOnClickListener() {
            cancelar()
        }

    }

    fun cadastrar() {
        val usuario = binding.txtUsuario.text.toString()
        val email = binding.txtEmail.text.toString()
        val senha = binding.txtSenha.text.toString()
        val confirmarSenha = binding.txtConfirmarSenha.text.toString()

        //Limpar usuairo da sessao aqui
        Utilitarios.abrirTela(this, CadastroClienteActivity::class.java)
    }

    fun cancelar() {
        //Limpar usuairo da sessao aqui
        finish()
    }

    fun validarFormulario(): Boolean {
        if (binding.txtUsuario.text.isNullOrEmpty()) {
            binding.txtUsuarioLayout.error = "Digite o Usuario"
            binding.txtUsuario.requestFocus()
            return false
        }
        else if (binding.txtEmail.text.isNullOrEmpty() || !binding.txtEmail.text.toString().contains("@")) {
            binding.txtEmailLayout.error = "Digite um Email valido"
            binding.txtEmail.requestFocus()
            return false
        }
        else if (binding.txtSenha.text.isNullOrEmpty()) {
            binding.txtSenhaLayout.error = "Digite a Senha"
            binding.txtSenha.requestFocus()
            return false
        }
        else if (binding.txtConfirmarSenha.text.isNullOrEmpty()) {
            binding.txtConfirmarSenhaLayout.error = "Digite a Senha"
            binding.txtConfirmarSenha.requestFocus()
            return false
        }
        //Validações adicionais
        else if (!binding.txtSenha.text.toString().equals(binding.txtConfirmarSenha.text.toString())) {
            binding.txtSenhaLayout.error = "As senhas são divergentes"
            binding.txtConfirmarSenhaLayout.error = "As senhas são divergentes"
            binding.txtSenha.requestFocus()
            return false
        }
        else {
            return true
        }
    }

    fun removeValidacao(input: TextInputLayout){
        input.isErrorEnabled = false
    }

}