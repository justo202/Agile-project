import tkinter as tk
from tkinter import filedialog, Text
import os
import sys

root = tk.Tk()

def kill():
    sys.exit()

canvas = tk.Canvas(root, height = 800, width = 800, bg="#263D42")
canvas.pack()

frame = tk.Frame(root, bg="white")
frame.place(relheight = 0.8, relwidth = 0.8, relx = 0.1, rely = 0.1)

exit = tk.Button(root, text = "Exit", padx = 10, pady = 10, 
                 fg = "white", bg = "#263D42", command = kill)
exit.pack()

root.mainloop()