package com.teyvat.genshop.menu.configuracoes

import android.content.Intent
import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.core.view.isVisible
import androidx.core.widget.doOnTextChanged
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.CadastroClienteActivity
import com.teyvat.genshop.CadastroEnderecoActivity
import com.teyvat.genshop.R
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.ActivityMenuBinding
import com.teyvat.genshop.databinding.FragmentDadosBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class DadosFragment : Fragment() {
    lateinit var binding: FragmentDadosBinding

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentDadosBinding.inflate(inflater)

        binding.txtNome.doOnTextChanged{ text, start, before, count -> binding.txtNomeLayout.isErrorEnabled = false  }
        binding.txtSobrenome.doOnTextChanged{ text, start, before, count -> binding.txtSobrenomeLayout.isErrorEnabled = false  }
        binding.txtDataNascimento.doOnTextChanged{ text, start, before, count -> binding.txtDataNascimentoLayout.isErrorEnabled = false  }
        binding.txtCPF.doOnTextChanged{ text, start, before, count -> binding.txtCPFLayout.isErrorEnabled = false  }
        binding.txtTelefone.doOnTextChanged{ text, start, before, count -> binding.txtTelefoneLayout.isErrorEnabled = false  }
        binding.txtCelular.doOnTextChanged{ text, start, before, count -> binding.txtCelularLayout.isErrorEnabled = false  }

        preencherFormulario()

        binding.btnAtualizar.setOnClickListener{
            ativaDesativaAlteracao(true)
        }

        binding.btnCancelar.setOnClickListener{
            ativaDesativaAlteracao(false)
        }

        binding.btnGravar.setOnClickListener{
            if(validarFormulario()) {
                atualizarDados()
            }
        }

        return binding.root
    }

    fun preencherFormulario() {
        if(Sessao.cliente != null){
            val callback = object : Callback<Cliente> {
                override fun onResponse(call: Call<Cliente>, response: Response<Cliente>) {
                    if(response.isSuccessful) {
                        Sessao.cliente = response.body()
                        binding.txtNome.setText(Sessao.cliente!!.first_name)
                        binding.txtSobrenome.setText(Sessao.cliente!!.last_name)
                        binding.txtDataNascimento.setText(Sessao.cliente!!.birth_date)
                        binding.txtCPF.setText(Sessao.cliente!!.cpf)
                        binding.txtTelefone.setText(Sessao.cliente!!.telephone)
                        binding.txtCelular.setText(Sessao.cliente!!.cellphone)
                    }
                    else {
                        val error = response.errorBody().toString()
                        Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                    }
                }
                override fun onFailure(call: Call<Cliente>, t: Throwable) {
                    Utilitarios.snackBarRequestFaliure(binding.root)
                }
            }

            API().cliente.listar("Bearer ${Sessao.usuario?.token}").enqueue(callback)
        }
        else {
            val intent = Intent(binding.root.context, CadastroClienteActivity::class.java)
            binding.root.context.startActivity(intent)
            requireActivity().finish()
        }
    }

    fun ativaDesativaAlteracao(estado: Boolean){
        binding.txtNome.isEnabled = estado
        binding.txtNomeLayout.isEnabled = estado

        binding.txtSobrenome.isEnabled = estado
        binding.txtSobrenomeLayout.isEnabled = estado

        binding.txtDataNascimento.isEnabled = estado
        binding.txtDataNascimentoLayout.isEnabled = estado

        binding.txtCPF.isEnabled = estado
        binding.txtCPFLayout.isEnabled = estado

        binding.txtTelefone.isEnabled = estado
        binding.txtTelefoneLayout.isEnabled = estado

        binding.txtCelular.isEnabled = estado
        binding.txtCelularLayout.isEnabled = estado

        binding.btnGravar.isVisible = estado
        binding.btnCancelar.isVisible = estado

        binding.btnAtualizar.isVisible = !estado
    }

    fun atualizarDados(){
        val callback = object : Callback<Cliente> {
            override fun onResponse(call: Call<Cliente>, response: Response<Cliente>) {
                if(response.isSuccessful) {
                    Sessao.cliente = response.body()
                    ativaDesativaAlteracao(false)
                    Utilitarios.snackBar(binding.root, "Dados atualizados com sucesso", Snackbar.LENGTH_LONG)
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                    Log.e("ERROR", response.errorBody().toString())
                }
            }
            override fun onFailure(call: Call<Cliente>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }
        val nome = binding.txtNome.text.toString()
        val sobrenome = binding.txtSobrenome.text.toString()
        val dataNascimento = binding.txtDataNascimento.text.toString()
        val cpf = binding.txtCPF.text.toString()
        val telefone = binding.txtTelefone.text.toString()
        val celular = binding.txtCelular.text.toString()

        var cliente = Cliente(Sessao.cliente!!.id!!, nome, sobrenome, dataNascimento, cpf, telefone, celular);
        API().cliente.atualizar(cliente.id!!,"Bearer ${Sessao.usuario?.token}", cliente).enqueue(callback)
    }

    fun validarFormulario(): Boolean {
        if (binding.txtNome.text.isNullOrEmpty()) {
            binding.txtNomeLayout.error = "Digite o Nome"
            binding.txtNome.requestFocus()
            return false
        }
        else if (binding.txtSobrenome.text.isNullOrEmpty()) {
            binding.txtSobrenomeLayout.error = "Digite o Sobrenome"
            binding.txtSobrenome.requestFocus()
            return false
        }
        else if (binding.txtDataNascimento.text.isNullOrEmpty()) {
            binding.txtDataNascimentoLayout.error = "Digite a data de nascimento"
            binding.txtDataNascimento.requestFocus()
            return false
        }
        else if (binding.txtCPF.text.isNullOrEmpty() || binding.txtCPF.text.toString().length < 11) {
            binding.txtCPFLayout.error = "Digite um CPF valido"
            binding.txtCPF.requestFocus()
            return false
        }
        else if (binding.txtTelefone.text.isNullOrEmpty() ||  binding.txtTelefone.text.toString().length < 10) {
            binding.txtTelefoneLayout.error = "Digite um Telefone valido"
            binding.txtTelefone.requestFocus()
            return false
        }
        else if (binding.txtCelular.text.isNullOrEmpty() ||  binding.txtCelular.text.toString().length < 11) {
            binding.txtCelularLayout.error = "Digite um Celular valido"
            binding.txtCelular.requestFocus()
            return false
        }
        else {
            return true
        }
    }

    companion object {
        @JvmStatic
        fun newInstance() = DadosFragment()
    }
}