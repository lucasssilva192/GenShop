package com.teyvat.genshop.utils

import android.app.Activity
import android.content.Context
import android.content.Intent
import android.view.View
import androidx.appcompat.app.AppCompatDelegate
import androidx.preference.PreferenceManager
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

    fun aplicarTemaEscuro(context: Context, delegate: AppCompatDelegate){
        val temaEscuro = PreferenceManager.getDefaultSharedPreferences(context).getBoolean("tema_escuro", true)
        if(temaEscuro){
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_YES)
            delegate.applyDayNight()
        }
        else {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO)
            delegate.applyDayNight()
        }
    }

    fun aplicarTema(context: Context, delegate: AppCompatDelegate){
        aplicarTemaEscuro(context, delegate)

        val corTema = PreferenceManager.getDefaultSharedPreferences(context).getString("tema_selecionado", "Default")
        when(corTema){
            "Pyro" -> {
                context.setTheme(R.style.Theme_GenShop_Pyro)
            }
            "Hydro" -> {
                context.setTheme(R.style.Theme_GenShop_Hydro)
            }
            "Electro" -> {
                context.setTheme(R.style.Theme_GenShop_Electro)
            }
            "Cryo" -> {
                context.setTheme(R.style.Theme_GenShop_Cryo)
            }
            "Anemo" -> {
                context.setTheme(R.style.Theme_GenShop_Anemo)
            }
            "Geo" -> {
                context.setTheme(R.style.Theme_GenShop_Geo)
            }
            "Dendro" -> {
                context.setTheme(R.style.Theme_GenShop_Dendro)
            }
        }
    }
}