package com.teyvat.genshop

import android.content.Context
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.core.widget.doOnTextChanged
import com.google.android.material.snackbar.Snackbar
import com.google.android.material.textfield.TextInputLayout
import com.google.gson.JsonObject
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.ActivityCadastroBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Usuario
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response


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
        val callback = object : Callback<Usuario> {
            override fun onResponse(call: Call<Usuario>, response: Response<Usuario>) {
                if(response.isSuccessful) {
                    Sessao.usuario = response.body()
                    gravarUsuarioLocal()

                    Utilitarios.abrirTela(this@CadastroActivity, CadastroClienteActivity::class.java)
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, "Credenciais Invalidas", Snackbar.LENGTH_LONG)
                    Log.e("ERROR", response.errorBody().toString())
                }
            }
            override fun onFailure(call: Call<Usuario>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }


        val usuario = binding.txtUsuario.text.toString()
        val email = binding.txtEmail.text.toString()
        val senha = binding.txtSenha.text.toString()

        var requisao = JsonObject()
        requisao.addProperty("name", usuario)
        requisao.addProperty("email", email)
        requisao.addProperty("password", senha)
        requisao.addProperty("device_name", "Android")
        API().usuario.cadastrar(requisao).enqueue(callback)
    }

    fun gravarUsuarioLocal(){
        val usuarioPref = getSharedPreferences("UsuarioInfo", Context.MODE_PRIVATE).edit()
        usuarioPref.putString("nome", Sessao.usuario?.name)
        usuarioPref.putString("token", Sessao.usuario?.token)
        usuarioPref.putString("email", Sessao.usuario?.email)
        usuarioPref.commit()
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