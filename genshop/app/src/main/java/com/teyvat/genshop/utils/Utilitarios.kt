package com.teyvat.genshop.utils

import android.app.Activity
import android.content.Intent
import android.view.View
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.CadastroClienteActivity
import com.teyvat.genshop.R

object Utilitarios {

    fun abrirTela(activity: Activity, classe: Class<out Any>){
        var intent = Intent(activity, classe)
        activity.startActivity(intent)
    }

    fun snackBar(view: View, mensagem: String, duracao: Int){
        Snackbar.make(view, mensagem, duracao)
            //.setAction(R.string.action_text) {
                // Responds to click on the action
           // }
            .show()
    }
}