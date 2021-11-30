package com.teyvat.genshop.menu.configuracoes

import android.content.Intent
import com.teyvat.genshop.models.Endereco
import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.core.view.isVisible
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.ShowEnderecoActivity
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.FragmentEnderecosBinding
import com.teyvat.genshop.databinding.ItemEnderecoBinding
import com.teyvat.genshop.models.EnumTipoEndereco
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class EnderecosFragment : Fragment() {
    lateinit var binding: FragmentEnderecosBinding

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentEnderecosBinding.inflate(inflater)

        listarEnderecos()
        binding.fabNovo.setOnClickListener {
            val intent = Intent(binding.root.context, ShowEnderecoActivity::class.java)
            intent.putExtra("cadastro", true)
            binding.root.context.startActivity(intent)
        }

        return binding.root
    }

    override fun onResume() {
        listarEnderecos()
        super.onResume()
    }

    fun listarEnderecos() {
        val callback = object: Callback<List<Endereco>> {
            override fun onResponse(call: Call<List<Endereco>>, response: Response<List<Endereco>>) {
                if(response.isSuccessful) {
                    val enderecos = response.body()
                    enderecos?.let {
                        atualizarUi(it)
                    }
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                    Log.e("ERROR", response.errorBody().toString())
                }
            }
            override fun onFailure(call: Call<List<Endereco>>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Não foi possível listar os endereços", Snackbar.LENGTH_LONG)
            }
        }

        API().endereco.listar("Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    fun atualizarUi(listaEndereco: List<Endereco>) {
        binding.container.removeAllViews()

        listaEndereco.forEach { endereco ->
            val itemBinding = ItemEnderecoBinding.inflate(layoutInflater)

            itemBinding.txtNomeEndereco.text = endereco.cep
            itemBinding.txtEndereco.text = "${endereco.address} - ${endereco.cep}"
            if (endereco.main.equals(EnumTipoEndereco.NaoSelecionado.valor)) {
                itemBinding.iconeAtivo.isVisible = false
            }

            itemBinding.root.setOnClickListener() { view ->
                if (endereco.main.equals(EnumTipoEndereco.NaoSelecionado.valor)) {
                    escolherEndereco(endereco)
                    endereco.main = "1"
                    Sessao.endereco = endereco
                }
                else {
                    Utilitarios.snackBar(binding.root, "Endereço já está selecionado", Snackbar.LENGTH_SHORT)
                }
            }

            itemBinding.btnAlterar.setOnClickListener() { view ->
                val intent = Intent(binding.root.context, ShowEnderecoActivity::class.java)
                intent.putExtra("endereco", endereco)
                binding.root.context.startActivity(intent)
            }

            itemBinding.btnExcluir.setOnClickListener() { view ->
                if(endereco.main.equals(EnumTipoEndereco.NaoSelecionado.valor)){
                    removerEndereco(endereco)
                }
                else{
                    Utilitarios.snackBar(binding.root, "Você não pode excluir um endereço selecionado.", Snackbar.LENGTH_LONG)
                }
            }

            binding.container.addView(itemBinding.root)
        }
    }

    fun escolherEndereco(endereco: Endereco) {
        val callback = object: Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful){
                    Utilitarios.snackBar(binding.root, "Endereço selecionado", Snackbar.LENGTH_SHORT)
                    listarEnderecos()
                }
                else {
                    Utilitarios.snackBar(binding.root, "Erro: ${response.errorBody().toString()}", Snackbar.LENGTH_SHORT)
                }
            }
            override fun onFailure(call: Call<Endereco>, t: Throwable) {
                Utilitarios.snackBarRequestFaliure(binding.root)
            }
        }

        API().endereco.mudarMain(endereco.id!!,"Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    fun removerEndereco(endereco: Endereco) {
        val callback = object: Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful){
                    Utilitarios.snackBar(binding.root, "Endereço removido com sucesso", Snackbar.LENGTH_LONG)
                    listarEnderecos()
                }
                else {
                    Utilitarios.snackBar(binding.root, "Erro: ${response.errorBody().toString()}", Snackbar.LENGTH_SHORT)
                }
            }
            override fun onFailure(call: Call<Endereco>, t: Throwable) {
                Utilitarios.snackBarRequestFaliure(binding.root)
            }
        }

        API().endereco.remover(endereco.id!!,"Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    companion object {
        @JvmStatic
        fun newInstance() = EnderecosFragment()
    }
}