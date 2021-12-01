    package com.teyvat.genshop.utils

import android.content.Intent
import android.util.Log
import android.view.LayoutInflater
import android.view.ViewGroup
import android.widget.Toast
import androidx.core.view.isVisible
import androidx.recyclerview.widget.RecyclerView
import androidx.viewbinding.ViewBinding
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.CadastroEnderecoActivity
import com.teyvat.genshop.databinding.ItemLojaBinding
import com.teyvat.genshop.databinding.ItemProdutoBinding
import com.teyvat.genshop.models.Endereco
import com.teyvat.genshop.models.EnumTipoEndereco
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.Produto
import com.google.gson.JsonObject
import com.squareup.picasso.Picasso
import com.teyvat.genshop.ShowCompraActivity
import com.teyvat.genshop.ShowProdutoActivity
import com.teyvat.genshop.ShowLojaActivity
import com.teyvat.genshop.databinding.*
import com.teyvat.genshop.models.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

    /*
    *  Parametros para utilizar o binding generico
    *  lista => A lista pode ser passado qualquer tipo de lista
    *  tipoLista => Utilizar o enum abaixo para passar o tipo. Ex: EnumTipoLista.ListaEndereco.valor
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
            if(binding is ItemEnderecoBinding && item is Endereco){
                binding.txtNomeEndereco.text = item.cep
                binding.txtEndereco.text = "${item.address} - ${item.cep}"
                if(item.main.equals(EnumTipoEndereco.NaoSelecionado.valor)){
                    binding.iconeAtivo.isVisible = false
                }

                binding.btnExcluir.setOnClickListener(){
                    //UtilitariosAPI.removeEndereco(binding.root, item)
                }

                binding.btnAlterar.setOnClickListener(){
                    val intent = Intent(binding.root.context, CadastroEnderecoActivity::class.java)
                    intent.putExtra("endereco", item)
                    binding.root.context.startActivity(intent)
                }

                binding.root.setOnClickListener(){
                    //UtilitariosAPI.escolherEndereco(binding.root, item)
                }
            }
            if(binding is ItemProdutoBinding && item is Produto){
                binding.txtNomeProduto.text = item.name
                binding.txtCategoriaProd.text = item.category
                binding.txtPreco.text = item.price
                val idProduto = item.id
                Picasso.get().load("http://192.168.3.26/api/product/image/${item.id}").into(binding.imgProduto)
                val quantidade = 1
                binding.root.setOnClickListener {
                    val intent = Intent(binding.root.context, ShowProdutoActivity::class.java)
                    intent.putExtra("nomeProd", item.name)
                    intent.putExtra("precoProd", item.price)
                    intent.putExtra("categoriaProd", item.category)
                    intent.putExtra("id", item.id)
                    intent.putExtra("descProd", item.description)
                    binding.root.context.startActivity(intent)
                }
                binding.imageView2.setOnClickListener {
                    Utilitarios.addAoCarrinho(binding.root, idProduto!!, quantidade)
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
            if(binding is ItemCarrinhoBinding && item is Produto){
                binding.txtNomeProduto.text = item.name
                binding.txtValor.text = item.price
                binding.editQuantidade.setText((item.quantity).toString())
                val idProduto = item.c_id
                Picasso.get().load("http://192.168.3.26/api/product/image/${idProduto}").into(binding.imgProduto)
                binding.btnRemover.setOnClickListener {
                    Utilitarios.remover_do_carrinho(binding.root, idProduto!!, 1)
                    binding.editQuantidade.setText((binding.editQuantidade.text.toString().toInt() - 1).toString())
                }
                binding.btnAdicionar.setOnClickListener {
                    Utilitarios.addAoCarrinho(binding.root, idProduto!!, 1)
                    binding.editQuantidade.setText((binding.editQuantidade.text.toString().toInt() + 1).toString())
                }

            }
            if(binding is ItemPedidoProduoBinding && item is ProdCompra){
                Log.e("PRODUTOS", "${item.name}")
                binding.txtNomeProduto.text = item.name
                binding.txtQtd.text = (item.qtd).toString()
                binding.txtPreco.text = item.price
                val idProduto = item.c_id
                Picasso.get().load("http://192.168.3.26/api/product/image/${idProduto}").into(binding.imgProduto)
            }
            if(binding is ItemCompraBinding && item is Compra)
            {
                binding.txtPedido.setText("Pedido #" + item.id)
                binding.root.setOnClickListener {
                    val intent = Intent(binding.root.context, ShowCompraActivity::class.java)
                    intent.putExtra("id", item.id)
                    intent.putExtra("price", item.price)
                    intent.putExtra("status", item.status)
                    intent.putExtra("address", item.address_id)
                    intent.putExtra("pagto", item.pagto)
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
            EnumTipoLista.ListaCarrinho.valor -> {
                genericBinding = ItemCarrinhoBinding.inflate(layoutInflater, parent, false)
            }
            EnumTipoLista.ListaPedidoProduto.valor -> {
                genericBinding = ItemPedidoProduoBinding.inflate(layoutInflater, parent, false)
            }
            EnumTipoLista.ListaCompra.valor -> {
                genericBinding = ItemCompraBinding.inflate(layoutInflater, parent, false)
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
    ListaCarrinho(5),
    ListaPedidoProduto(6),
    ListaCompra(7)
}