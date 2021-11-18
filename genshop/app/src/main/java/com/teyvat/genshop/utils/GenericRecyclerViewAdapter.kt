    package com.teyvat.genshop.utils

import android.content.Context
import android.content.Intent
import android.transition.Visibility
import android.view.LayoutInflater
import android.view.ViewGroup
import android.widget.Toast
import androidx.core.view.isVisible
import androidx.recyclerview.widget.RecyclerView
import androidx.viewbinding.ViewBinding
import com.squareup.picasso.Picasso
import com.teyvat.genshop.ShowLojaActivity
import com.teyvat.genshop.ShowProdutoActivity
import com.teyvat.genshop.databinding.ItemEnderecoBinding
import com.teyvat.genshop.databinding.ItemLojaBinding
import com.teyvat.genshop.databinding.ItemProdutoBinding
import com.teyvat.genshop.models.Address
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.Produto

    /*
    *  Parametros para utilizar o binding generico
    *  lista => A lista pode ser passado qualquer tipo de lista
    *  tipoLista => Utilizar o enum abaixo para passar o tipo. Ex: EnumTipoLista.ListaEndereco.valor
    *
    */
class GenericRecyclerViewAdapter(val lista: List<out Any>, val tipoLista: Int) : RecyclerView.Adapter<GenericRecyclerViewAdapter.GenericViewHolder>() {

    class GenericViewHolder(val binding: ViewBinding) : RecyclerView.ViewHolder(binding.root) {
        fun bind(item: Any) {

            /*
            * Para realizar o binding do item é necessario o tipo do binding e o tipo do item(Data Class)
            * Ex:
            * binding is ItemEnderecoBinding => Verifica tipo do binding
            * item is Address => Verifica tipo do item
            */
            if(binding is ItemEnderecoBinding && item is Address){
                binding.txtNomeEndereco.text = item.cep
                binding.txtEndereco.text = "${item.address} - ${item.cep}"
                if(item.main.equals("Não")){
                    binding.iconeAtivo.isVisible = false
                }

                binding.root.setOnClickListener(){
                    Toast.makeText(binding.root.context, "Cliclou no endereço ${item.address}", Toast.LENGTH_LONG).show()
                }
            }
            if(binding is ItemProdutoBinding && item is Produto){
                binding.txtNomeProduto.text = item.name
                binding.txtCategoriaProd.text = item.category_id
                binding.txtPreco.text = item.price
                Picasso.get().load("http://192.168.3.26/api/product/image/${item.id}").into(binding.imgProduto)
                binding.root.setOnClickListener {
                    val intent = Intent(binding.root.context, ShowProdutoActivity::class.java)
                    intent.putExtra("nomeProd", item.name)
                    intent.putExtra("precoProd", item.price)
                    intent.putExtra("categoriaProd", item.category_id)
                    intent.putExtra("id", item.id)
                    intent.putExtra("descProd", item.description)
                    binding.root.context.startActivity(intent)
                }
            }
            if(binding is ItemLojaBinding && item is Loja){
                binding.txtNomeLoja.text = item.name
                binding.txtCategoria.text = item.type
                Picasso.get().load("http://192.168.3.26/api/store/image/${item.id}").into(binding.imgLoja)
                binding.root.setOnClickListener {
                    val intent = Intent(binding.root.context, ShowLojaActivity::class.java)
                    intent.putExtra("nomeLoja", item.name)
                    intent.putExtra("tipoLoja", item.type)
                    intent.putExtra("telefone", item.telephone)
                    intent.putExtra("celular", item.cellphone)
                    intent.putExtra("endereco", item.address)
                    intent.putExtra("id", item.id)
                    binding.root.context.startActivity(intent)
                }
            }
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): GenericRecyclerViewAdapter.GenericViewHolder {
        val layoutInflater = LayoutInflater.from(parent.context)
        var genericBinding: ViewBinding

        genericBinding = ItemEnderecoBinding.inflate(layoutInflater)

        /* Utilizar aqui o parametro tipoLista passada no construtor da classe e verificar no when pelo Enum */
        when (tipoLista) {
            EnumTipoLista.ListaEndereco.valor -> {
                genericBinding = ItemEnderecoBinding.inflate(layoutInflater, parent, false)
            }
            EnumTipoLista.ListaProduto.valor -> {
                genericBinding = ItemProdutoBinding.inflate(layoutInflater, parent, false)
            }
            EnumTipoLista.ListaLoja.valor -> {
                genericBinding = ItemLojaBinding.inflate(layoutInflater, parent, false)
            }
        }

        return GenericViewHolder(genericBinding)
    }

    override fun onBindViewHolder(holder: GenericViewHolder, position: Int) {
        holder.bind(lista[position]) //
    }

    override fun getItemCount(): Int {
        return lista.size //Voltar tamanho da lista
    }

}

enum class EnumTipoLista(val valor: Int) {
    ListaEndereco(1),
    ListaLoja(2),
    ListaPedido(3),
    ListaProduto(4),
    ListaCarrinho(5)
}